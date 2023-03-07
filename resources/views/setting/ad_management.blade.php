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
                    <h3 class="m-0">{{ __('messages.ad_space.ad_management') }}</h3>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(['route' => 'setting.update', 'files' => true,'class'=>'form']) }}
                {{ Form::hidden('sectionName', $sectionName) }}
                <div class="row">
                    <div class="col-lg-4 my-3">
                        {{ Form::label('header',__('messages.ad_space.header').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="header" id="showCaptcha"
                                   type="checkbox" value="1"  {{$setting['header'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('index_top',__('messages.ad_space.index_top').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="index_top" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['index_top'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('index_bottom',__('messages.ad_space.index_bottom').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="index_bottom" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['index_bottom'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('post_details',__('messages.ad_space.post_details').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="post_details" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['post_details'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('details_side',__('messages.ad_space.details_side').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="details_side" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['details_side'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('categories',__('messages.ad_space.categories').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="categories" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['categories'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('trending_post',__('messages.ad_space.trending_post').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="trending_post" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['trending_post'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('popular_news',__('messages.ad_space.popular_news').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="popular_news" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['popular_news'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('trending_post_index_page',__('messages.ad_space.trending_post_index_page').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="trending_post_index_page" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['trending_post_index_page'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('popular_news_index_page',__('messages.ad_space.popular_news_index_page').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="popular_news_index_page" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['popular_news_index_page'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        {{ Form::label('recommended_post_index_page',__('messages.ad_space.recommended_post_index_page').':',
                                     ['class'=>'form-label fs-6']) }}
                    </div>
                    <div class="col-lg-8 my-3">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px is-active" name="recommended_post_index_page" id="showCaptcha"
                                   type="checkbox" value="1" {{$setting['recommended_post_index_page'] ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mt-5">
                        {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
