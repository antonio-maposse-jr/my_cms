@extends('layouts.app')
@section('title')
    {{__('messages.settings')}}
@endsection

@section('content')
        <div class="container-fluid">
            @include('setting.setting_menu')
            <div class="card mb-5 mb-xl-10">
                <div class="card-header">
                    <div class="card-title m-0">
                        <h3 class="m-0">{{__('messages.setting.contact_information')}}</h3>
                    </div>
                </div>
                    {{ Form::open(['route' => 'setting.update', 'id'=>'contact-information-form','class'=>'form contact-information-form']) }}
                    {{ Form::hidden('sectionName', $sectionName) }}
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('contact_address',__('messages.setting.contact_address').':',
                                     ['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                {{ Form::textarea('contact_address', $setting['contact_address']??null, ['class' => 'form-control','rows'=>'6','id'=>'contact_address','required']) }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('about_text',__('messages.setting.about_text').':',
                                     ['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8 fv-row">
                                {{ Form::textarea('about_text', $setting['about_text']??null, ['class' => 'form-control','rows'=>'6','id'=>'about_text','required']) }}
                            </div>
                        </div>
                        <div class="d-flex pt-0 justify-content-start">
                            {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        @endsection
{{--        @section('page_js')--}}
{{--    <script src="{{asset('/web/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/settings/settings.js')}}"></script>--}}
{{--@endsection--}}
