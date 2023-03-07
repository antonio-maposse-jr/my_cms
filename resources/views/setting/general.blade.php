@extends('layouts.app')
@section('title')
    {{__('messages.settings')}}
@endsection

@section('content')
   
    <div class="container-fluid">
        @include('setting.setting_menu')
        <div class="card">
            <div class="card-header">
                <div class="card-title m-0">
                    <h3 class="m-0">{{ __('messages.setting.general_details') }}</h3>
                </div>
            </div>
            {{ Form::open(['route' => 'setting.update', 'files' => true,'class'=>'form']) }}
            {{ Form::hidden('sectionName', $sectionName) }}
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-lg-4">
                        {{ Form::label('app_name',__('messages.setting.app_name').':',['class'=>'form-label required']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::text('app_name', $setting['application_name'], ['class' => 'form-control','placeholder'=>__('messages.setting.app_name'),'required']) }}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-4">
                        {{ Form::label('contact_no',__('messages.user.contact_number').':',['class'=>'form-label required']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::text('contact_no', $setting['contact_no'], ['class' => 'form-control ','placeholder'=>__('messages.user.contact_number'),'required']) }}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-4">
                        {{ Form::label('email',__('messages.user.email').':',['class'=>'form-label required']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::email('email', $setting['email'], ['class' => 'form-control','placeholder'=>__('messages.user.email'),'required']) }}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-4">
                        {{ Form::label('copy_right_text',__('messages.setting.copy_right_text').':',['class'=>'form-label required ']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::text('copy_right_text', $setting['copy_right_text']??null, ['class' => 'form-control','placeholder'=>__('messages.setting.copy_right_text'),'required']) }}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-4">
                        {{ Form::label('front_language',__('messages.setting.front_language').' :', ['class' => 'form-label required']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::select('front_language', getLanguage(), $setting['front_language']??null, ['class' => 'form-select ', 'id' => 'selectLanguage','data-dropdown-parent'=>'#kt_account_profile_details_form', 'placeholder' => __('messages.common.select_language'), 'data-control' => 'select2','required','aria-label'=>"Select a Language",'data-control'=>"select2"]) }}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-4">
                        {{ Form::label('rss_feed_update_time',__('messages.setting.rss_feed_auto_update').' :', ['class' => 'form-label required']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::select('rss_feed_update_time', \App\Models\Setting::AUTO_UPDATE_RSS_FEED,  $setting['rss_feed_update_time']??null, ['class' => 'form-select ', 'id' => 'selectRssFeed','data-dropdown-parent'=>'#kt_account_profile_details_form', 'placeholder' => __('messages.setting.select_time'), 'data-control' => 'select2','required','aria-label'=>"Select a Rss Feed",'data-control'=>"select2"]) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputImage" class="form-label">{{__('messages.setting.logo')}}: </label>
                        <span data-bs-toggle="tooltip"
                              data-placement="top"
                              data-bs-original-title="Best resolution for this logo will be 90x60.">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                        </span>
                    </div>
                    <div class="col-lg-8">
                        <div class="mb-3" io-image-input="true">
                            <div class="d-block">
                                <div class="image-picker">
                                    @php
                                        $style = 'style="background-image: url('.(($setting['logo'])?asset($setting['logo']):asset('assets/image/infyom-logo.png')).')"';
                                    @endphp
                                    <div class="image previewImage" id="exampleInputImage"
                                         {!! $style !!}>
                                    </div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                          data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.common.change_logo')}}">
                        <label> 
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                            <input type="file" name="logo" class="image-upload d-none" accept="image/*"/> 
                        </label> 
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputImage" class="form-label">{{__('messages.setting.favicon')}}: </label>
                        <span data-bs-toggle="tooltip"
                              data-placement="top"
                              data-bs-original-title="Best resolution for this favicon will be 32X32.">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                        </span>
                    </div>
                    @php
                        $style2= 'style="background-image: url('.(($setting['favicon'])?asset($setting['favicon']):asset('assets/image/infyom-logo.png')).')"';
                    @endphp
                    <div class="col-lg-8">
                        <div class="mb-3" io-image-input="true">
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage w-60px h-60px" id="exampleInputImage"
                                         {!! $style2 !!}>
                                    </div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                          data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.common.change_favicon')}}">
                        <label> 
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                            <input type="file" name="favicon" class="image-upload d-none" accept="image/*"/> 
                        </label> 
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex pt-0 justify-content-start">
                    {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header">
                <div class="card-title m-0">
                    <h3 class="m-0">{{ __('messages.payment_method') }}</h3>
                </div>
            </div>
            {{ Form::open(['route' => 'payment-setting.update', 'files' => true, 'id'=>'kt_account_profile_details_form','class'=>'form']) }}
            {{ Form::hidden('sectionName', $sectionName.'_1') }}
            <div class="card-body pt-0">
                <div class="card-body   p-3">
                    <div class="row mb-6">
                        <div class="table-responsive px-0">
                            <table>
                                <tbody class="d-flex flex-wrap">
                                @foreach(\App\Models\Plan::PAYMENT_METHOD as $key => $paymentGateway)
                                    @if(checkPaymentGateway($key))
                                        <tr class="w-100 d-flex justify-content-between">
                                            <td class="p-2">
                                                <div class="form-check form-check-custom">
                                                    <input class="form-check-input" type="checkbox" value="{{$key}}"
                                                           name="payment_gateway[]"
                                                           id="{{$key}}" {{in_array($paymentGateway, $selectedPaymentGateways) ?'checked':''}} />
                                                    <label class="form-label" for="{{$key}}">
                                                        {{$paymentGateway}}
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-start ">
                    {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header">
                <div class="card-title m-0">
                    <h3 class="m-0">{{ __('messages.setting.google_recaptcha') }}</h3>
                </div>
            </div>
            {{ Form::open(['route' => 'setting.update', 'files' => true, 'id'=>'kt_account_profile_details_form','class'=>'form']) }}
            {{ Form::hidden('sectionName', $sectionName.'_1') }}
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        {{ Form::label('show_captcha',__('messages.setting.show_captcha').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active"
                                   name="show_captcha" id="showCaptcha"
                                   type="checkbox" value="1"
                                    {{$setting['show_captcha'] ? 'checked' : ''}} >
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-5 captchaOptions {{$setting['show_captcha'] ? '' : 'd-none'}}">
                    <div class="col-lg-4">
                        {{ Form::label('site_key',__('messages.setting.site_key').':',
                                 ['class'=>'form-label required fs-6']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::text('site_key', $setting['site_key']??null, ['class' => 'form-control','placeholder'=>__('messages.setting.site_key')]) }}
                    </div>
                </div>
                <div class="row mb-5 captchaOptions {{$setting['show_captcha'] ? '' : 'd-none'}}">
                    <div class="col-lg-4">
                        {{ Form::label('secret_key',__('messages.setting.secret_key').':',
                                ['class'=>'col-lg-4 form-label required fs-6']) }}
                    </div>
                    <div class="col-lg-8">
                        {{ Form::text('secret_key', $setting['secret_key']??null, ['class' => 'form-control','placeholder'=>__('messages.setting.secret_key')]) }}
                    </div>
                </div>
                <div class="d-flex justify-content-start mt-5">
                    {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
{{--    <div class="container-fluid mt-5">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <div class="card-title m-0">--}}
{{--                    <h3 class="m-0">{{ __('messages.setting.download-db') }}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <a href="{{route('db-download')}}" class="btn btn-primary">--}}

{{--                    {{ __('messages.setting.download-db') }}--}}
{{--                    <i class="fa-solid fa-download px-2"></i>--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{asset('/web/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/settings/settings.js')}}"></script>--}}
{{--@endsection--}}
