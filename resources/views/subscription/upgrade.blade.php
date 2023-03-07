@extends('layouts.app')
@section('title')
    {{ __('Manage Subscription') }}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="card subscription">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <div class="nav-group mx-auto">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a data-bs-toggle="tab" href="#monthly"
                                   class="nav-link active">
                                    {{ __('Monthly') }}</a>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="tab" href="#yearly"
                                   class="nav-link">
                                    {{ __('Yearly') }}</a>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="tab" href="#unlimited"
                                   class="nav-link">
                                    {{ __('Unlimited') }}</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-12 text-gray-700 h5 text-center pt-10">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="monthly">
                                <div class="row justify-content-center">
                                    @forelse($monthlyPlans as $plan)
                                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
                                            <div class="card pricing-card bg-light p-5 shadow-lg mb-8">
                                                <h1>{{ $plan->name }}</h1>
                                                <h1 class="pricing-amount">
                                                    {{ currencyFormat($plan->price, $plan->currency->currency_code) }}
                                                </h1>

                                                <div class="card-body p-3">
                                                    <div class="pricing-description text-start">
                                                        <div class="mb-6">
                                                            <h3 class="mb-1">{{ __('What`s In Startup Plan')}}</h3>
                                                            <small class="text-muted">
                                                                {{ __('Duration').' '. __('Months')}}</small>
                                                            <br>
                                                            <small class="text-muted">
                                                                {{ __('No Of Posts').' : '.$plan->post_count }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-center flex-row-fluid pt-5">
                                                    @if(!empty(getCurrentSubscription()) &&  $plan->id == getCurrentSubscription()->plan_id && !getCurrentSubscription()->isExpired())
                                                        @if($plan->price != 0)
                                                            <button type="button"
                                                                    class="btn btn-success rounded-pill mx-auto d-block cursor-remove-plan pricing-plan-button-active"
                                                                    data-id="{{ $plan->id }}">
                                                                {{ __('currently Active') }}</button>
                                                        @else
                                                            <button type="button"
                                                                    class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                {{ __('Renew Free Plan') }}
                                                            </button>
                                                        @endif
                                                    @else

                                                        @if(!empty(getCurrentSubscription()) && !getCurrentSubscription()->isExpired() && 
                                                            ($plan->price == 0 || $plan->price != 0))
                                                            @if($plan->hasZeroPlan->count() == 0)
                                                                <a data-turbo="false"
                                                                   href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                   class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                                   data-id="{{ $plan->id }}"
                                                                   data-plan-price="{{ $plan->price }}">
                                                                    {{ __('Switch Plan') }}</a>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('Renew Free Plan') }}
                                                                </button>
                                                            @endif
                                                        @else
                                                            @if($plan->price!=0 && $plan->hasZeroPlan->count() == 0)
                                                                <a data-turbo="false"
                                                                   href="{{$plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                   class="btn btn-primary rounded-pill mx-auto  {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                                   data-id="{{ $plan->id }}"
                                                                   data-plan-price="{{ $plan->price }}">
                                                                    {{ __('Choose Plan') }}</a>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('Renew Free Plan') }}
                                                                </button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="not-plan">
                                            <span class="text-muted h1">{{ __('No Plan Available') }}</span>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="yearly">
                                <div class="row justify-content-center">
                                    @forelse($yearlyPlans as $plan)
                                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
                                            <div class="card pricing-card bg-light p-5 shadow-lg mb-8">
                                                <h1>{{ $plan->name }}</h1>
                                                <h1 class="pricing-amount">
                                                    {{ currencyFormat($plan->price, $plan->currency->currency_code) }}
                                                </h1>

                                                <div class="card-body p-3">
                                                    <div class="pricing-description text-start">
                                                        <div class="mb-6">
                                                            <h3 class="mb-1">{{ __('What`s In Startup Plan')}}</h3>
                                                            <small class="text-muted">
                                                                {{ __('Duration').' '. __('Year')}}</small>
                                                            <br>
                                                            <small class="text-muted">
                                                                {{ __('No Of Posts').' : '.$plan->post_count }}</small>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="flex-center flex-row-fluid pt-5">
                                                    @if(!empty(getCurrentSubscription()) &&  $plan->id == getCurrentSubscription()->plan_id && !getCurrentSubscription()->isExpired())
                                                        @if($plan->price != 0)
                                                            <button type="button"
                                                                    class="btn btn-success rounded-pill mx-auto d-block cursor-remove-plan pricing-plan-button-active"
                                                                    data-id="{{ $plan->id }}">
                                                                {{ __('currently Active') }}</button>
                                                        @else
                                                            <button type="button"
                                                                    class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                {{ __('Renew Free Plan') }}
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if(!empty(getCurrentSubscription()) && !getCurrentSubscription()->isExpired() && ($plan->price == 0 || $plan->price != 0))
                                                            @if($plan->hasZeroPlan->count() == 0)
                                                                <a data-turbo="false"
                                                                   href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                   class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                                   data-id="{{ $plan->id }}"
                                                                   data-plan-price="{{ $plan->price }}">
                                                                    {{ __('Switch Plan') }}</a>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('Renew Free Plan') }}
                                                                </button>
                                                            @endif
                                                        @else
                                                            @if($plan->price!=0 && $plan->hasZeroPlan->count() == 0)
                                                                <a data-turbo="false"
                                                                   href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                   class="btn btn-primary rounded-pill mx-auto  {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                                   data-id="{{ $plan->id }}"
                                                                   data-plan-price="{{ $plan->price }}">
                                                                    {{ __('Choose Plan') }}</a>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('Renew Free Plan') }}
                                                                </button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="not-plan">
                                            <span class="text-muted h1">{{ __('No Plan Available') }}</span>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="unlimited">
                                <div class="row justify-content-center">
                                    @forelse($unLimitedPlans as $plan)
                                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
                                            <div class="card pricing-card bg-light p-5 shadow-lg mb-8">
                                                <h1>{{ $plan->name }}</h1>
                                                <h1 class="pricing-amount">
                                                    {{ currencyFormat($plan->price, $plan->currency->currency_code) }}
                                                </h1>

                                                <div class="card-body p-3">
                                                    <div class="pricing-description text-start">
                                                        <div class="mb-6">
                                                            <h3 class="mb-1">{{ __('What`s In Startup Plan')}}</h3>
                                                            <small class="text-muted">
                                                                {{ __('Duration').' '. __('Unlimited')}}</small>
                                                            <br>
                                                            <small class="text-muted">
                                                                {{ __('No Of Posts').' : '.$plan->post_count }}</small>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="flex-center flex-row-fluid pt-5">
                                                    @if(!empty(getCurrentSubscription()) &&  $plan->id == getCurrentSubscription()->plan_id && !getCurrentSubscription()->isExpired())
                                                        @if($plan->price != 0)
                                                            <button type="button"
                                                                    class="btn btn-success rounded-pill mx-auto d-block cursor-remove-plan pricing-plan-button-active"
                                                                    data-id="{{ $plan->id }}">
                                                                {{ __('currently Active') }}</button>
                                                        @else
                                                            <button type="button"
                                                                    class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                {{ __('Renew Free Plan') }}
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if(!empty(getCurrentSubscription()) && !getCurrentSubscription()->isExpired() && ($plan->price == 0 || $plan->price != 0))
                                                            @if($plan->hasZeroPlan->count() == 0)
                                                                <a data-turbo="false"
                                                                   href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                   class="btn btn-primary rounded-pill mx-auto {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                                   data-id="{{ $plan->id }}"
                                                                   data-plan-price="{{ $plan->price }}">
                                                                    {{ __('Switch Plan') }}</a>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('Renew Free Plan') }}
                                                                </button>
                                                            @endif
                                                        @else
                                                            @if($plan->price!=0 && $plan->hasZeroPlan->count() == 0)
                                                                <a data-turbo="false"
                                                                   href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                   class="btn btn-primary rounded-pill mx-auto  {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                                   data-id="{{ $plan->id }}"
                                                                   data-plan-price="{{ $plan->price }}">
                                                                    {{ __('Choose Plan') }}</a>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                                                                    {{ __('Renew Free Plan') }}
                                                                </button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="not-plan">
                                            <span class="text-muted h1">{{ __('No Plan Available') }}</span>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
</script>
