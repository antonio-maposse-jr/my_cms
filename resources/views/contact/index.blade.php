@extends('layouts.app')
@section('title')
    {{__('messages.contacts')}}
@endsection

@section('content')
        @include('flash::message')
    <div class="container-fluid">
            <div class="pt-0">
                <livewire:contact-table/>
            </div>
    </div>
    @include('contact.show_modal')
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{asset('assets/js/contact/contact.js')}}"></script>--}}
{{--@endsection--}}

