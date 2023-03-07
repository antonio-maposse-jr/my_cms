@extends('layouts.app')
@section('title')
    {{ __('messages.patient.details') }}
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="">{{ __('messages.user.staff_details') }}</h1>
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="card-title m-0">
                <div class="d-flex flex-column flex-xl-row">
                    @include('staffs.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
