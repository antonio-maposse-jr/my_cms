@extends('layouts.app')
@section('title')
    {{ __('Payment') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{url()->previous()}}">{{ __('messages.common.back') }}</a>
                </div>
               
                <div class="col-12">
                    @include('flash::message')
                </div>
                <div class="card">
                    @php
                        $cpData = getCurrentPlanDetails();
                        $planText = ($cpData['isExpired']) ? __('Current Expire') : __('Current Plan');
                        $currentPlan = $cpData['currentPlan'];
                    @endphp
                    <div class="card-body">
                        <div class="row">
                            @if($planText != 'Current Expired Plan')
                                <div class="col-md-6">
                                    <div class="card p-5 me-2 shadow rounded">
                                        <div class="card-header py-0 px-0">
                                            <h3 class="align-items-start flex-column p-sm-5 p-0">
                                                <span class="fw-bolder text-primary fs-1 mb-1 me-0">{{$planText}}</span>
                                            </h3>
                                        </div>
                                        <div class="px-4">
                                            <div class="d-flex align-items-center py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 fw-bolder">{{__('messages.subscription.plan_name')}}</h4>
                                                <span
                                                        class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['name']}}</span>
                                            </div>
                                            <div class="d-flex align-items-center  py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-3 fw-bolder">{{__('messages.subscription.plan_price')}}</h4>
                                                <span class="fs-5 text-muted fw-bold mt-1">
                                        <span class="mb-2">
                                            {{ $currentPlan->currency->currency_icon }}
                                        </span>
                                        {{ number_format($currentPlan->price) }}
                                    </span>
                                            </div>
                                            <div class="d-flex align-items-center  py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 fw-bolder">{{__('messages.subscription.start_date')}}</h4>
                                                <span
                                                        class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['startAt']}}</span>
                                            </div>
                                            <div class="d-flex align-items-center  py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 fw-bolder">{{__('messages.subscription.end_date')}}</h4>
                                                <span
                                                        class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['endsAt']}}</span>
                                            </div>
                                            <div class="d-flex align-items-center  py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 fw-bolder">{{__('messages.subscription.used_days')}}</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['usedDays']}} {{__('messages.subscription.days')}}</span>
                                            </div>
                                            <div class="d-flex align-items-center  py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 fw-bolder">{{__('messages.subscription.remaining_days')}}</h4>
                                                <span
                                                        class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['remainingDays']}} {{__('messages.subscription.days')}}</span>
                                            </div>
                                            <div class="d-flex align-items-center  py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 fw-bolder">{{__('messages.subscription.used_balance')}}</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">
                                        <span class="mb-2">
                                            {{ $currentPlan->currency->currency_icon }}
                                        </span>
                                        {{$cpData['usedBalance']}}
                                    </span>
                                            </div>
                                            <div class="d-flex align-items-center  py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 fw-bolder">{{__('messages.subscription.remaining_balance')}}</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">
                                        <span class="mb-2">{{ $currentPlan->currency->currency_icon }}</span>
                                        {{$cpData['remainingBalance']}}
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $newPlan = getProratedPlanData($subscriptionsPricingPlan->id);
                            @endphp

                            {{ Form::hidden('amount_to_pay', $newPlan['amountToPay'], ['id' => 'amountToPay']) }}
                            {{ Form::hidden('plan_end_date', $newPlan['endDate'], ['id' => 'planEndDate']) }}
                            <div class="col-md-6 col-12 @if($planText == 'Current Expired Plan') mx-auto @endif">
                                <div class="card h-100 p-5 me-2 shadow rounded">
                                    <div class="card-header py-0 px-0">
                                        <h3 class="align-items-start flex-column p-sm-5 p-0">
                                            <span
                                                    class="fw-bolder text-primary fs-1 mb-1 me-0">{{__('messages.plans.new_plan')}}</span>
                                        </h3>
                                    </div>
                                    <div class="px-5 pb-5">
                                        <div class="d-flex align-items-center py-2">
                                            <h4 class="fs-5 w-50 plan-data mb-0 me-5 fw-bolder">{{__('messages.subscription.plan_name')}}</h4>
                                            <span class="fs-5 w-50 text-muted fw-bold mt-1">{{$newPlan['name']}}</span>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <h4 class="fs-5 w-50 plan-data mb-0 me-5 fw-bolder">{{__('messages.subscription.plan_price')}}</h4>
                                            <span class="fs-5 w-50 text-muted fw-bold mt-1">
                                        <span class="mb-2">
                                            {{ $subscriptionsPricingPlan->currency->currency_icon }}
                                        </span>
                                        {{ ($subscriptionsPricingPlan->price) }}
                                    </span>
                                        </div>
                                        <div class="d-flex align-items-center  py-2">
                                            <h4 class="fs-5 w-50 plan-data mb-0 me-5 fw-bolder">{{__('messages.subscription.start_date')}}</h4>
                                            <span
                                                    class="fs-5 w-50 text-muted fw-bold mt-1">{{$newPlan['startDate']}}</span>
                                        </div>
                                        <div class="d-flex align-items-center  py-2">
                                            <h4 class="fs-5 w-50 plan-data mb-0 me-5 fw-bolder">{{__('messages.subscription.end_date')}}</h4>

                                            <span
                                                    class="fs-5 w-50 text-muted fw-bold mt-1">{{$newPlan['endDate']}}</span>
                                        </div>
                                        <div class="d-flex align-items-center  py-2">
                                            <h4 class="fs-5 w-50 plan-data mb-0 me-5 fw-bolder">{{__('messages.subscription.total_days')}}</h4>
                                            <span
                                                    class="fs-5 w-50 text-muted fw-bold mt-1">{{$newPlan['totalDays']}} {{__('messages.subscription.days')}}</span>
                                        </div>
                                        <div class="d-flex align-items-center  py-2">
                                            <h4 class="fs-5 w-50 plan-data mb-0 me-5 fw-bolder">{{__('messages.subscription.remaining_balance')}}</h4>
                                            <span class="fs-5 w-50 text-muted fw-bold mt-1">
                                        {{ $subscriptionsPricingPlan->currency->currency_icon }}
                                                {{$newPlan['remainingBalance']}}
                                    </span>
                                        </div>
                                        <div class="d-flex align-items-center  py-2">
                                            <h4 class="fs-5 w-50 plan-data mb-0 me-5 fw-bolder">{{__('messages.subscription.payable_amount')}}</h4>
                                            <span class="fs-5 w-50 text-muted fw-bold mt-1">
                                    {{ $subscriptionsPricingPlan->currency->currency_icon }}
                                                {{($newPlan['amountToPay'])}}
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center mt-5 plan-controls">
                                <div class="mt-5 me-3 w-50 {{ $newPlan['amountToPay'] <= 0 ? 'd-none' : '' }}">
                                    {{ Form::select('payment_type', $paymentTypes ,null , ['class' => 'form-select','required', 'id' => 'paymentType', 'data-control' => 'select2', 'placeholder'=>__("Select Payment Type")]) }}
                                </div>
                                <div class="mt-5 stripePayment proceed-to-payment {{ $newPlan['amountToPay'] > 0 ? 'd-none' : '' }}">
                                    <button type="button"
                                            class="btn btn-primary rounded-pill mx-auto d-block makePayment"
                                            data-id="{{ $subscriptionsPricingPlan->id }}"
                                            data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                                        {{ __('messages.subscription.pay_or_switch_plan') }}
                                    </button>
                                </div>
                                <div class="mt-5 paypalPayment proceed-to-payment d-none">
                                    <button type="button"
                                            class="btn btn-primary rounded-pill mx-auto d-block paymentByPaypal"
                                            data-id="{{ $subscriptionsPricingPlan->id }}"
                                            data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                                        {{ __('messages.subscription.pay_or_switch_plan') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center mt-5 plan-controls">
                                <form class="manuallyPaymentForm" type="post" enctype="multipart/form-data">
                                    <div class="mb-3 d-none manuallyPayAttachment me-5" io-image-input="true">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="exampleInputImage"
                                                               class="form-label">{{ __('messages.attachment') }}
                                                            :-</label>
                                                        <div class="d-block">
                                                            <div class="image-picker">
                                                                <div class="image previewImage" id="exampleInputImage"
                                                                     style="background-image: url('{{ asset('front_web/images/default.jpg') }}')"></div>
                                                                <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                                      data-bs-toggle="tooltip"
                                                                      data-placement="top"
                                                                      data-bs-original-title="Choose Attachment">
                                        <label>
                                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                            <input type="file" id="attachment" name="attachment"
                                                   class="image-upload d-none"/>
                                        </label>
                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <label for="exampleInputImage"
                                                               class="form-label">{{__('messages.notes')}}
                                                            :-</label>
                                                        {{ Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Add Your Notes','rows'=>'5']) }}
                                                    </div>
                                                </div>
                                            </div>
                                            {{ Form::hidden('planId', $subscriptionsPricingPlan->id, ['id' => 'planId', 'class' => 'manuallyPaymentPlanId']) }}
                                            {{ Form::hidden('price', $subscriptionsPricingPlan->price, ['id' => 'price', 'class' => 'manuallyPaymentDataPlanPrice']) }}
                                            {{ Form::hidden('amount_to_pay', $newPlan['amountToPay'], ['id' => 'amountToPay']) }}
                                            {{ Form::hidden('plan_end_date', $newPlan['endDate'], ['id' => 'planEndDate']) }}
                                            {{ Form::hidden('payment_type', 4, ['id' => 'payment_type']) }}
                                            <div class="col-lg-12">
                                                <div class="mt-5 ManuallyPayment proceed-to-payment d-none">
                                                    <button type="submit"
                                                            class="btn btn-primary rounded-pill mx-auto d-block manuallyPay">
                                                        Cash Pay
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

