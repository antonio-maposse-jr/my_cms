<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentTransaction;
use App\Models\Currency;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\Vcard;
use App\Repositories\AppointmentRepository;
use App\Repositories\SubscriptionRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class StripeController extends AppBaseController
{


    public function paymentFailed(Request $request)
    {
        Flash::success(__('messages.placeholder.purchased_plan'));

        return view('sadmin.plans.payment.paymentSuccess');
    }

    /**
     * @param Request $request
     * @throws Exception
     * @return Application|RedirectResponse|Redirector
     *
     */


    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function handleFailedPayment()
    {

        $subscriptionPlanId = session('subscription_plan_id');

        /** @var SubscriptionRepository $subscriptionRepo */
        $subscriptionRepo = app(SubscriptionRepository::class);
        $subscriptionRepo->paymentFailed($subscriptionPlanId);

        Flash::error(__('messages.placeholder.unable_to_process_payment'));

        return redirect(route('subscription.index'));

    }
}
