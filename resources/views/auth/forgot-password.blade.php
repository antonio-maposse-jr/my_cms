@extends('layouts.auth')
@section('title')
    Forgot Password
@endsection
@section('content')
<div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center p-0">
        <div class="col-12 text-center">
            <a href="/" class="image mb-7 mb-sm-10">
                <img alt="Logo" src="{{ getSettingValue()['logo'] }}" height="85px" width="85px">
            </a>
        </div>
        <div class="width-540">

            @include('flash::message')
            @include('layouts.errors')
        </div>
        <div class="bg-theme-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto">
            <div class="text-center">
                <h1 class="text-center mb-7">Forgot Password ?</h1>
                <h3>
                    {{ __('auth.forgot_password.title') }}
                </h3>
                <div class="mb-4">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-sm-7 mb-4">
                    <label for="formInputEmail" class="form-label">
                        {{ __('messages.mails.email_address') }}:<span class="required"></span>
                    </label>
                    <input class="form-control" id="formInputEmail" aria-describedby="emailHelp" value="{{ old('email') }}"
                           type="email" placeholder="{{ __('messages.mails.email_address') }}" name="email" required autocomplete="off" autofocus>
                </div>
                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-3">{{ __('Email Password Reset Link') }}</button>
                    <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('crud.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
    <!--end::Main-->
@endsection
@push('scripts')
@endpush
