@extends('layouts.app')
@section('title')
    {{ __('Manage Subscription') }}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        @include('layouts.errors')
        
        <div class="d-flex flex-column">
            @if(checkManuallyPaymentStatus()->payment_type  == App\Models\Subscription::MANUALLY)
            <div class="py-5">
                <div class="d-flex align-items-center rounded py-5 px-5 bg-light-danger">
                    <span class="svg-icon svg-icon-3x svg-icon-danger me-5">                                                                                                             </span>
                    <div class="text-gray-700 text-danger fw-bold fs-6">Note: {{__('messages.placeholder.subscribed_plan_wait')}}
                    </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <h2>{{ $currentPlan->plan->name }}</h2>
                            <h5 class="mb-12">
                                @if( \Carbon\Carbon::now() > $currentPlan->ends_at)
                                    <span class="text-danger">
                                    {{ __('Expired').' '.\Carbon\Carbon::parse($currentPlan->ends_at)->format('dS M, Y') }}
                                </span>
                                @else
                                    <span class="text-success">
                                     {{ __('Active Until').' '.\Carbon\Carbon::parse($currentPlan->ends_at)->format('dS M, Y') }}
                                </span>
                                @endif
                            </h5>
                            <div class="fs-5 mb-2">
                                <div class="text-gray-800 fw-bolder me-1">
                                    {{ currencyFormat($currentPlan->plan_amount, $currentPlan->plan->currency->currency_code,) .'/ '.\App\Models\Plan::DURATION[$currentPlan->plan_frequency] }}
                                </div>
                                @if(!empty($currentPlan->trial_ends_at))
                                    @php
                                        $startsAt = \Carbon\Carbon::now();
                                        $totalDays = \Carbon\Carbon::parse($currentPlan->starts_at)->diffInDays($currentPlan->ends_at);
                                        $usedDays = \Carbon\Carbon::parse($currentPlan->starts_at)->diffInDays($startsAt);
                                        $remainingDays = $totalDays - $usedDays;
                                    @endphp
                                    <div class="text-gray-600 fw-bold">
                                        <small>
                                            @if($remainingDays > 0)
                                                {{__('Trial Days')}}
                                                : {{ $remainingDays.' '.__('Days').' '.__('Remaining') }}
                                            @endif
                                        </small>
                                    </div>
                                @endif
                            </div>
                            <div class="fs-6 text-gray-600 fw-bold mb-2">
                                {{ __('Subscribed Date').': '.\Carbon\Carbon::parse($currentPlan->starts_at)->format('dS M, Y') }}
                            </div>
                            <div class="fs-6 text-gray-600 fw-bold mb-2">
                                {{ __('Number Of Post').': ' .$currentPlan->no_of_post }}
                            </div>
                        </div>
                        <div class="col-lg-5 mt-lg-0 mt-5">
{{--                            @if(checkManuallyPaymentStatus()->payment_type  != App\Models\Subscription::MANUALLY)--}}
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary @if(checkManuallyPaymentStatus()->payment_type  == App\Models\Subscription::MANUALLY) disabled @endif"  href="{{route('subscription.upgrade')}}">
                                        {{ __('Upgrade Plan') }}
                                    </a>
                                </div>
{{--                            @endif--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="d-flex flex-column table-striped">
            <livewire:user-subscription-table/>
        </div>
    </div>
@endsection
<script>
</script> 
