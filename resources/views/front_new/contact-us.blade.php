@extends('front_new.layouts.app')
@section('title')
    {{__('messages.common.contact_us') }}
@endsection
@php
    $settings = App\Models\Setting::pluck('value','key')->toArray();
@endphp
@section('pageCss')
    <link href="{{asset('front_web/build/scss/contact-us.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="contact-us-page">
    <!-- start contact-us-section -->
    <section class="contact-us-section py-60">
        <div class="container">
            <div class="section-heading border-bottom-0">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-8 section-heading-left">
                        <h2 class="text-black mb-2 pb-lg-1 fw-7">{{__('messages.setting.contact_information')}}</h2>
                        <p class="fs-14 text-gray">
                            {!! $settings['about_text'] !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="contact-us pt-60">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-desc">
                            <div class="desc d-flex  mb-lg-5 mb-4">
                                <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-location-dot  text-white"></i>
                                </div>
                                <a class="fs-14 text-black mb-0  ps-4">
                                    {!! $settings['contact_address'] !!}
                                </a>
                            </div>
                            <div class="desc d-flex align-items-sm-center mb-lg-5 mb-4">
                                <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-envelope  text-white"></i>
                                </div>
                                <a href="mailto:{{$settings['email']}}" class="fs-14 text-black mb-0  ps-4 d-flex  align-items-center"><span class="__cf_email__">{{$settings['email']}}</span>
                                </a>
                            </div>
                            <div class="desc d-flex align-items-sm-center mb-lg-0 mb-4 ">
                                <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-phone text-white"></i>
                                </div>
                                <a href="tel:{{$settings['contact_no']}}" class="fs-14 text-black mb-0  ps-4 -flex  align-items-center">{{$settings['contact_no']}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="leave-message-section bg-light px-30 py-4">
                            <h5 class="fs-16 text-black fw-6 mb-3">{{__('messages.common.leave_a_message')}}</h5>
                            <form id="contactUsFrom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="name" class="form-control fs-14 text-gray" placeholder="{{__('messages.comment.enter_your_name')}}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="email" name="email" class="form-control fs-14 text-gray" placeholder="{{__('messages.comment.enter_your_email')}}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" name="phone" class="form-control fs-14 text-gray" placeholder="{{__('messages.comment.enter_phone_number')}}">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control fs-14 text-gray" rows="3" placeholder="{{__('messages.comment.type_your_comments')}}"></textarea>
                                    </div>
                                    @if($settings['show_captcha'] == "1")
                                        <div class="form-group mb-1">
                                            <div class="g-recaptcha" id="gRecaptchaContainerContactUs"
                                                 data-sitekey="{{ $settings['site_key'] }}"></div>
                                            <div id="g-recaptcha-error"></div>
                                        </div>
                                        <input type="hidden" value="{{ $settings['show_captcha'] }}" id="contactPageGoogleCaptch">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary submit-btn">{{__('messages.common.submit')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact-us-section -->

</div>
<!-- start footer section -->
@endsection
