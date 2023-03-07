@extends('layouts.app')
@section('title')
    {{ __('messages.mail') }}
@endsection
@php $styleCss = 'style' @endphp
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
        <div class="row">
            @include('mail_setting.fields')
        </div>
    </div>

@endsection
<script>
</script>
