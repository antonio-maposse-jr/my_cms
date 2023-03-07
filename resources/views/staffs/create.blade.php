@extends('layouts.app')
@section('title')
    {{__('messages.staff.add_staff')}}
@endsection
@php $styleCss = 'style' @endphp
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('staff.index') }}">{{ __('messages.common.back') }}</a>
        </div>

        <div class="col-12">
            @include('layouts.errors')
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['staff.store'], 'method' => 'POST', 'files' => true,'id'=> 'createStaffForm']) }}
                    @include('staffs.fields')
                    {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

