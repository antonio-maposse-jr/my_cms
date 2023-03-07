@extends('layouts.app')
@section('title')
    {{__('messages.news_letters')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:news-letter-table/>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/news_letter/news_letter.js')}}"></script>--}}
{{--@endsection--}}
