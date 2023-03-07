<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegisterRequest;
use App\Models\MultiTenant;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param CreateRegisterRequest $request
     * @throws ValidationException
     * @return RedirectResponse
     *
     */
    public function store(CreateRegisterRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

//            $userDefaultLanguage = Setting::where('key', 'user_default_language')->first()->value ?? 'en';
            $adminRole = Role::whereName('customer')->first();
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'language'   => 'en',
                'password'   => Hash::make($request->password),
                'type'       => User::STAFF,
            ])->assignRole($adminRole);

            $plan = Plan::whereIsDefault(true)->first();

            Subscription::create([
                'plan_id'        => $plan->id,
                'plan_amount'    => $plan->price,
                'plan_frequency' => Plan::MONTHLY,
                'starts_at'      => Carbon::now(),
                'ends_at'        => Carbon::now()->addDays($plan->trial_days),
                'trial_ends_at'  => Carbon::now()->addDays($plan->trial_days),
                'status'         => Subscription::ACTIVE,
                'user_id'        => $user->id,
                'no_of_post'     => $plan->post_count,
            ]);

            DB::commit();

            event(new Registered($user));

            Flash::success(__('messages.placeholder.registered_success'));

            return redirect(route('login'));
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
