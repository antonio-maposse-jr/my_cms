@extends('layouts.app')
@section('title')
    {{__('messages.polls')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:poll-table/>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/poll/poll.js')}}"></script>--}}
{{--@endsection--}}

