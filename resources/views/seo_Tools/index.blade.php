@extends('layouts.app')
@section('title')
    {{__('messages.seo-tools')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-12">
            @include('layouts.errors')
            @include('flash::message')
        </div>
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
{{--            <a class="btn btn-outline-primary float-end"--}}
{{--               href="">{{ __('messages.common.back') }}</a>--}}
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'seo-tools.update', 'files' => true, 'id'=>'SEOToolsForm','class'=>'form']) }}

                <div class="row mb-6">
                    {{ Form::label('lang_id',__('messages.seo-tool.language').':',['class'=>'col-lg-4 col-form-label required']) }}
                    <div class="col-lg-8">
                        {{ Form::select('lang_id', getLanguage(), !empty($seoTool->lang_id) ? $seoTool->lang_id : null , ['class' => 'form-select', 'id' => 'SEOToolsLanguageId', 'placeholder' => __('messages.common.select_language'), 'data-control' => 'select2','required']) }}
                    </div>
                </div>
                <div class="row mb-6">
                    {{ Form::label('site_title',__('messages.seo-tool.site_title').':',
                    ['class'=>'col-lg-4 col-form-label required']) }}
                    <div class="col-lg-8">
                        {{ Form::text('site_title',$seoTool->site_title, ['class' => 'form-control','placeholder'=>__('messages.seo-tool.site_title'),'required']) }}
                    </div>
                </div>
                <div class="row mb-6">
                    {{ Form::label('home_title',__('messages.seo-tool.home_title').':',['class'=>'col-lg-4 col-form-label required']) }}
                    <div class="col-lg-8">
                        {{ Form::text('home_title',$seoTool->home_title, ['class' => 'form-control','placeholder'=>__('messages.seo-tool.home_title'),'required']) }}
                    </div>
                </div>
                <div class="row mb-6">
                    {{ Form::label('site_description',__('messages.seo-tool.site_description').':',['class'=>'col-lg-4 col-form-label required']) }}
                    <div class="col-lg-8">
                        {{ Form::textarea('site_description',$seoTool->site_description, ['class' => 'form-control','placeholder'=>__('messages.seo-tool.site_description'),'rows'=>'4','required']) }}
                    </div>
                </div>
                <div class="row mb-6">
                    {{ Form::label('keyword',__('messages.seo-tool.keyword').':',['class'=>'col-lg-4 col-form-label required']) }}
                    <div class="col-lg-8">
                        {{ Form::textarea('keyword',$seoTool->keyword, ['class' => 'form-control form-control-solid','placeholder'=>__('messages.seo-tool.maxkeyword'),'rows'=>'4','required']) }}
                    </div>
                </div>
                <div class="row">
                    {{ Form::label('google_analytics',__('messages.seo-tool.google_analytics').':',['class'=>'col-lg-4 col-form-label']) }}
                    <div class="col-lg-8 fv-row">
                        {{ Form::textarea('google_analytics',$seoTool->google_analytics, ['class' => 'form-control','placeholder'=>__('messages.seo-tool.google_analytics'), 'rows'=>'4']) }}
                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::submit(__('messages.user.save_changes'),['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection


