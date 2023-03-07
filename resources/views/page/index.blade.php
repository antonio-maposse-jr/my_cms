@extends('layouts.app')
@section('title')
    {{__('messages.pages')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div>
            <div class="pt-0">
                @include('flash::message')  
                <livewire:page-table/>
            </div>
        </div>
    </div>
    @include('page.template.template')
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/page/page.js')}}"></script>--}}
{{--@endsection--}}

