@extends('layouts.app')
@section('title')
    {{__('messages.rss_feed.add_rss_feed')}}
@endsection

@section('content')

    <div class="container-fluid">
        
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('rss-feed.index') }}">{{ __('messages.common.back') }}</a>
        </div>
        @include('layouts.errors')
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['rss-feed.store']]) }}
                @include('rss_feed.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
