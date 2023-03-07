<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Repositories\SubscriptionRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PaypalController extends AppBaseController
{
    /**
     * @var SubscriptionRepository
     */
    private SubscriptionRepository $subscriptionRepository;

    /**
     * @param SubscriptionRepository $subscriptionRepository
     */
    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function onBoard(Request $request)
    {
        $plan = Plan::with('currency')->findOrFail($request->planId);

        if ($plan->currency->currency_code != null && !in_array(strtoupper($plan->currency->currency_code),
                getPayPalSupportedCurrencies())) {
            return $this->sendError(__('messages.placeholder.this_currency_is_not_supported'));
        }

        $data = $this->subscriptionRepository->manageSubscription($request->get('planId'));

        if (!isset($data['plan'])) { // 0 amount plan or try to switch the plan if it is in trial mode
            // returning from here if the plan is free.
            if (isset($data['status']) && $data['status'] == true) {
                return $this->sendSuccess($data['subscriptionPlan']->name.' '.__('messages.subscription_pricing_plans.has_been_subscribed'));
            } else {
                if (isset($data['status']) && $data['status'] == false) {
                    return $this->sendError(__('messages.placeholder.cannot_switch_to_zero'));
                }
            }
        }

        $subscriptionsPricingPlan = $data['plan'];
        $subscription = $data['subscription'];


        $provider = new PayPalClient();
        $provider->getAccessToken();

        $data = [
            'intent'              => 'CAPTURE',
            'purchase_units'      => [
                [
                    'reference_id' => $subscription->id,
                    'amount'       => [
                        'value'         => $data['amountToPay'],
                        'currency_code' => $subscription->plan->currency->currency_code,
                    ],
                ],
            ],
            'application_context' => [
                'cancel_url' => route('paypal.failed'),
                'return_url' => route('paypal.success'),
            ],
        ];

        $order = $provider->createOrder($data);


        return response()->json(['link' => $order['links'][1]['href'], 'status' => 200]);

    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->getAccessToken();
        $token = $request->get('token');
        $orderInfo = $provider->showOrderDetails($token);


        try {
            // Call API with your client and get a response for your call
            $response = $provider->capturePaymentOrder($token);

            $subscriptionId = $response['purchase_units'][0]['reference_id'];
            $subscriptionAmount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $transactionID = $response['id'];     // $response->result->id gives the orderId of the order created above

            Subscription::findOrFail($subscriptionId)->update(['status' => Subscription::ACTIVE]);
            // De-Active all other subscription
            Subscription::whereUserId(getLogInUser()->id)
                ->where('id', '!=', $subscriptionId)
                ->update([
                    'status' => Subscription::INACTIVE,
                ]);

            $transaction = Transaction::create([
                'transaction_id' => $transactionID,
                'type'           => Transaction::PAYPAL,
                'amount'         => $subscriptionAmount,
                'status'         => Subscription::ACTIVE,
                'meta'           => json_encode($response),
                'user_id'        => getLogInUserId(),
            ]);

            // updating the transaction id on the subscription table
            $subscription = Subscription::findOrFail($subscriptionId);
            $subscription->update(['transaction_id' => $transaction->id]);

            return redirect(route('subscription.index'));
//            return view('sadmin.plans.payment.paymentSuccess');
        } catch (HttpException $ex) {
            print_r($ex->getMessage());
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function failed()
    {
        Flash::error(__('messages.placeholder.unable_to_process_payment'));

        return redirect(route('subscription.index'));
    }
}
