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
                        <h3 class="m-0">{{__('messages.setting.cookie_warning')}}</h3>
                    </div>
                </div>
                <div  class="collapse show">
                    {{ Form::open(['route' => 'setting.update', 'files' => true, 'id'=>'kt_account_profile_details_form','class'=>'form']) }}
                    {{ Form::hidden('sectionName', $sectionName) }}
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('show_cookie',__('messages.setting.show_cookie_warning').':',
                                     ['class'=>'form-label fw-bold fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                    <div>
                                        <input class="form-check-input" type="radio" name="show_cookie" value="1"
                                               id="showCookie_1" {{  ($setting['show_cookie'] == App\Models\Setting::Yes) ? 'checked':''}} />
                                        <label class="form-check-label mx-0" for="showCookie">
                                            {{__('messages.page.yes')}}
                                        </label>
                                        <input class="form-check-input " type="radio" name="show_cookie" value="0"
                                               id="showCookie_0" {{  ($setting['show_cookie'] == App\Models\Setting::No) ? 'checked':''}} />
                                        <label class="form-check-label  mx-1" for="showCookie">
                                            {{__('messages.page.no')}}
                                        </label>
                                    </div>
                            </div>

                        </div>
                        <div class="row mb-6">
                            <textarea class="form-control" rows="5" data-kt-autosize="true" name="cookie_warning"
                                      placeholder="{{__('messages.setting.cookie_warning')}}"
                                      required>{{ $setting['cookie_warning'] }}</textarea>
                        </div>
                        <div class="d-flex pt-0 justify-content-start">
                            {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{asset('/web/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/settings/settings.js')}}"></script>--}}
{{--@endsection--}}
