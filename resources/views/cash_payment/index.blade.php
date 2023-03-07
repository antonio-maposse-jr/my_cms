@extends('layouts.app')
@section('title')
    {{__('messages.cash_payment')}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:cash-payment-table/>
        </div>
    
@include('cash_payment.paymentApproved')
    </div>
@endsection
