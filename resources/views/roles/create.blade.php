@extends('layouts.app')
@section('title')
    {{__('messages.role.add_role')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('roles.index') }}">{{ __('messages.common.back') }}</a>
        </div>

        <div class="col-12">
            @include('layouts.errors')
        </div>
        <div class="card">
            <div class="card-body p-12">
                {{ Form::open(['route' => 'roles.store']) }}
                    @include('roles.fields')
                    {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/roles/roles.js')}}"></script>--}}
{{--@endsection--}}
