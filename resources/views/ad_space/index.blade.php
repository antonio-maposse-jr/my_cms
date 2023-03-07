@extends('layouts.app')
@section('title')
    {{__('messages.ad_space.ad_space')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
                <a class="btn btn-primary float-end" href="{{ route('setting.index',['section' => 'ad_management'])}}">
                    {{ __('messages.ad_space.disable_ad') }}
                </a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-12">
            @include('layouts.errors')
        </div>
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'ad-spaces.store','files' => 'true','method'=>'POST']) }}
                @include('ad_space.fields')
                {{ Form::close() }}
            </div>
        </div>  
    </div>
@endsection
    
