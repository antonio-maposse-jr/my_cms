<?php

namespace App\Http\Controllers;

use App\Mail\ManualPaymentGuideMail;
use App\Mail\ManualPaymentStatusMail;
use App\Mail\SuperAdminManualPaymentMail;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\Subscription;
use App\Repositories\SubscriptionRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class SubscriptionController extends AppBaseController
{
    protected SubscriptionRepository $subscriptionRepo;

    /**
     * @param SubscriptionRepository $subscriptionRepo
     */
    public function __construct(SubscriptionRepository $subscriptionRepo)
    {
        $this->subscriptionRepo = $subscriptionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $currentPlan = getCurrentSubscription();

        $days = $remainingDay = '';
        if ($currentPlan->ends_at > Carbon::now()) {
            $days = Carbon::parse($currentPlan->ends_at)->diffInDays();
            $remainingDay = $days.' Days';
        }

        if ($days >= 30 && $days <= 365) {
            $remainingDay = '';
            $months = floor($days / 30);
            $extraDays = $days % 30;
            if ($extraDays > 0) {
                $remainingDay .= $months.' Month '.$extraDays.' Days';
            } else {
                $remainingDay .= $months.' Month ';
            }
        }

        if ($days >= 365) {
            $remainingDay = '';
            $years = floor($days / 365);
            $extraMonths = floor($days % 365 / 30);
            $extraDays = floor($days % 365 % 30);
            if ($extraMonths > 0 && $extraDays < 1) {
                $remainingDay .= $years.' Years '.$extraMonths.' Month ';
            } elseif ($extraDays > 0 && $extraMonths < 1) {
                $remainingDay .= $years.' Years '.$extraDays.' Days';
            } elseif ($years > 0 && $extraDays > 0 && $extraMonths > 0) {
                $remainingDay .= $years.' Years '.$extraMonths.' Month '.$extraDays.' Days';
            } else {
                $remainingDay .= $years.' Years ';
            }
        }

        return view('subscription.index', compact('currentPlan', 'remainingDay'));
    }

    public function upgrade(): Factory|View|Application
    {
        $plans = Plan::with(['currency'])
            ->get();

        $monthlyPlans = $plans->where('frequency', Plan::MONTHLY);
        $yearlyPlans = $plans->where('frequency', Plan::YEARLY);
        $unLimitedPlans = $plans->where('frequency', Plan::UNLIMITED);

        return view('subscription.upgrade', compact('monthlyPlans', 'yearlyPlans', 'unLimitedPlans'));
    }

    public function choosePaymentType($planId, $context = null, $fromScreen = null): Factory|View|Application
    {
        // code for checking the current plan is active or not, if active then it should not allow to choose that plan
        $subscriptionsPricingPlan = Plan::findOrFail($planId);
        $paymentTypes = getPaymentGateway();

        return view('subscription.payment_for_plan', compact('subscriptionsPricingPlan', 'paymentTypes'));
    }

    public function purchaseSubscription(Request $request)
    {
        $subscriptionPlanId = $request->get('plan_id');

        $result = $this->subscriptionRepo->purchaseSubscriptionForStripe($subscriptionPlanId);
        // returning from here if the plan is free.
        if (isset($result['status']) && $result['status'] == true) {
            return $this->sendSuccess($result['subscriptionPlan']->name.' '.__('messages.subscription.has_been_subscribed'));
        } else {
            if (isset($result['status']) && $result['status'] == false) {
                return $this->sendError(__('messages.placeholder.cannot_switch_to_zero'));
            }
        }

        return $this->sendResponse($result, 'Session created successfully.');
    }

    public function paymentSuccess(Request $request)
    {
        /** @var SubscriptionRepository $subscriptionRepo */
        $subscriptionRepo = app(SubscriptionRepository::class);
        $subscription = $subscriptionRepo->paymentUpdate($request);
        Flash::success($subscription->plan->name.' '.__('messages.subscription.has_been_subscribed'));

        return redirect(route('subscription.index'));
    }

    public function manualPay(Request $request): JsonResponse
    {
        $input = $request->all();

        $this->subscriptionRepo->manageSubscriptionForManualPayment($request->get('planId'), $input);
        $data = Subscription::whereUserId(getLogInUserId())->orderBy('created_at', 'desc')->first();

        $asds = Subscription::whereId($data->id)->update(['payment_type' => Subscription::MANUALLY]);

        $manual_payment_guide_step = Setting::where('key', 'manual_payment_guide')->first();

        $user = \Illuminate\Support\Facades\Auth::user();
        $super_admin_data = [
            'super_admin_msg' => $user->full_name.' created request for payment of '.$data->plan->currency->currency_icon.''.$data->payable_amount,
            'attachment'      => $data->attachment ?? "",
            'notes'           => $data->notes ?? "",
            'id'              => $data->id,
        ];


        Mail::to($user['email'])
            ->send(new ManualPaymentGuideMail($manual_payment_guide_step['value'], $user));

        Mail::to('sadmin@vcard.com')
            ->send(new SuperAdminManualPaymentMail($super_admin_data, 'sadmin@vcard.com'));


        return $this->sendSuccess(__('messages.placeholder.subscribed_plan_wait'));
    }

    public function downloadAttachment($id): Response|Application|ResponseFactory
    {

        $subscription = Subscription::whereId($id)->first();

        [$file, $headers] = $this->subscriptionRepo->downloadAttachment($subscription);

        return response($file, 200, $headers);
    }

    public function planStatus(Request $request)
    {
        $data = Subscription::with('user','plan.currency')->whereId($request->id)->first();
            $input = $request->all();
        $input['notes'] = isset($input['notes']) ? $input['notes'] : null;
        if ($input['status'] == 'Rejected') {
            Subscription::whereId($request->id)->update([
                'status'       => 0,
                'reject_notes' => $input['notes'],
                'payment_type' => Subscription::REJECTED,
            ]);
        }
        // Approved Payment 
        if ($input['status'] == 'Manually') {
            Subscription::whereUserId($data->user->id)
                ->where('id', '!=', $request->id)
                ->update(['status' => 0]);
            
            Subscription::whereId($request->id)->update([
                'status'       => 1,
                'reject_notes' => $input['notes'],
                'payment_type' => Subscription::PAID,
            ]);
        }
        $input['status'] = ($input['status'] == 'Manually') ? 'Approved' : $input['status'];
        $super_admin_data = [
            'super_admin_msg' => 'Your Manual Payment Request Is'.' '.$input['status'] .' of '.$data->plan->currency->currency_icon.''.$data->plan->price,
            'notes'           =>$input['notes'] ?? "",
            'name' =>      $data->user->full_name
        ];
        Mail::to($data->user->email)
            ->send(new ManualPaymentStatusMail($super_admin_data, $data->user));

        return $this->sendSuccess(__('messages.placeholder.payment_received'));
    }



    /**
     * @return Application|Factory|View
     */
    public function subscribedUserPlans()
    {
        return view('subscribed_user_plans.index');
    }
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function userSubscribedPlanEdit(Request $request): JsonResponse
    {
        $subscription = Subscription::whereId($request->id)->first();

        return $this->sendResponse($subscription, 'Subscription successfully retrieved.');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function userSubscribedPlanUpdate(Request $request): JsonResponse
    {
        $subscription = Subscription::where('id', $request->id)->update([
            'ends_at' => $request->end_date,
            'status'  => Subscription::ACTIVE,
        ]);

        return $this->sendResponse($subscription, 'Subscription date successfully updated.');
    }
}
