@extends('layouts.app')
@section('title')
    {{ __('messages.comments') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('id',Auth::user()->hasRole('customer'),['id' => 'loginUserRole']) }}
            @include('flash::message')
            <livewire:comment-table/>
        </div>
    </div>

@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/comment/comment.js')}}"></script>--}}
{{--@endsection--}}
