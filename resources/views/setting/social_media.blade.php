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
                        <h3 class="m-0">{{__('messages.setting.social_media_setting')}}</h3>
                    </div>
                </div>
                    {{ Form::open(['route' => 'setting.update', 'files' => true ,'id'=>'socialMediaForm']) }}
                    {{ Form::hidden('sectionName', $sectionName) }}
                    {{ Form::hidden('isEdit',true,['id' => 'socialMediaIsEdit']) }}
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('facebook_url',__('messages.setting.facebook_url').':',
                                     ['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                {{ Form::text('facebook_url', $setting['facebook_url']??null, ['class' => 'form-control','id'=>'facebookUrl','placeholder'=>__('messages.setting.facebook_url'),'required']) }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('twitter_url',__('messages.setting.twitter_url').':',
                                    ['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                {{ Form::text('twitter_url', $setting['twitter_url']??null,['class' => 'form-control','id'=>'twitterUrl','placeholder'=>__('messages.setting.twitter_url'),'required']) }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('instagram_url',__('messages.setting.instagram_url').':',['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                {{ Form::text('instagram_url', $setting['instagram_url']??null, ['class' => 'form-control','id'=>'instagramUrl','placeholder'=>__('messages.setting.instagram_url'),'required']) }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('pinterest_url',__('messages.setting.pinterest_url').':',['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                {{ Form::text('pinterest_url', $setting['pinterest_url']??null, ['class' => 'form-control','id'=>'pinterestUrl','placeholder'=>__('messages.setting.pinterest_url'),'required']) }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('linkedin_url',__('messages.setting.linkedin_url').':',['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                {{ Form::text('linkedin_url', $setting['linkedin_url']??null, ['class' => 'form-control','id'=>'linkedInUrl','placeholder'=>__('messages.setting.linkedin_url'),'required']) }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('vk_url',__('messages.setting.vk_url').':',['class'=>'form-label required fs-6']) }}
                            </div>
                            <div class="col-lg-8">
                                {{ Form::text('vk_url', $setting['vk_url']??null, ['class' => 'form-control','id'=>'vkUrl','placeholder'=>__('messages.setting.vk_url'),'required']) }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                            {{ Form::label('telegram_url',__('messages.setting.telegram_url').':',['class'=>'form-label required fw-bold fs-6']) }}
                            </div>
                            <div class="col-lg-8 fv-row">
                                {{ Form::text('telegram_url', $setting['telegram_url']??null, ['class' => 'form-control','id'=>'telegramUrl','placeholder'=>__('messages.setting.telegram_url'),'required']) }}
                            </div>
                        </div>
                        <div class="row mb-6">
                          <div class="col-lg-4">
                            {{ Form::label('youtube_url',__('messages.setting.youtube_url').':',['class'=>'form-label required fs-6']) }}
                          </div>
                            <div class="col-lg-8">
                                {{ Form::text('youtube_url', $setting['youtube_url']??null, ['class' => 'form-control','id'=>'youtubeUrl','placeholder'=>__('messages.setting.youtube_url'),'required']) }}
                            </div>
                        </div>
                        <div class="d-flex pt-0 justify-content-start">
                            {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                </div>
            
                    {{ Form::close() }}
                </div>
    
        
@endsection
{{--@section('page_js')--}}

{{--    <script src="{{mix('assets/js/settings/settings.js')}}"></script>--}}
{{--@endsection--}}
