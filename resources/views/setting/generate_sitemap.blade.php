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
                    <h3 class="m-0">{{ __('messages.setting.generate_sitemap') }}</h3>
                </div>
            </div>
            {{ Form::open(['route' => 'setting.update', 'files' => true,'class'=>'form']) }}
            {{ Form::hidden('sectionName', $sectionName) }}
            <div class="card-body">
                <div class="d-flex pt-0 justify-content-start">
                    {{ Form::submit(__('messages.setting.run_commend'),['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection
