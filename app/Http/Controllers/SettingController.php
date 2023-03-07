<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\PaymentGateway;
use App\Models\Plan;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class SettingController extends AppBaseController
{
    /**
     * @var SettingRepository
     */
    private $settingRepository;

    /**
     * SettingController constructor.
     *
     * @param SettingRepository $SettingRepository
     */
    public function __construct(SettingRepository $SettingRepository)
    {
        $this->settingRepository = $SettingRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $setting = Setting::pluck('value', 'key')->toArray();
        $selectedPaymentGateways = PaymentGateway::pluck('payment_gateway')->toArray();
        $sectionName = ($request->get('section') === null) ? 'general' : $request->get('section');

        return view("setting.$sectionName",
            compact('sectionName', 'setting', 'selectedPaymentGateways'));
    }

    /**
     * @param UpdateSettingRequest $request
     * @throws \Illuminate\Validation\ValidationException
     * @return RedirectResponse
     *
     */
    public function update(UpdateSettingRequest $request)
    {

        $input = $request->all();
        
        if ($request->show_captcha == null) {
            $input['show_captcha'] = '0';
        } else {
            $this->validate($request, [
                'site_key'   => 'required',
                'secret_key' => 'required',
            ]);
        }

        $id = Auth::id();
        $this->settingRepository->update($input, $id);

        Flash::success('Settings updated successfully.');

        return Redirect::back();
    }

    public function paymentUpdate(Request $request)
    {

        $paymentGateways = $request->payment_gateway;

        PaymentGateway::query()->delete();

        if (isset($paymentGateways)) {
            foreach ($paymentGateways as $paymentGateway) {
                PaymentGateway::updateOrCreate(['payment_gateway_id' => $paymentGateway],
                    [
                        'payment_gateway' => Plan::PAYMENT_METHOD[$paymentGateway],
                    ]);
            }
            Flash::success('Settings updated successfully.');

            return Redirect::back();
        }
    }

}
