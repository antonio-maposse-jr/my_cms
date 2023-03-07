@extends('layouts.app')
@section('title')
    {{__('messages.roles')}}
@endsection

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:role-table/>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/roles/roles.js')}}"></script>--}}
{{--@endsection--}}
