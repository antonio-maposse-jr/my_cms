@extends('layouts.app')
@section('title')
    {{ __('messages.images') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:gallery-table/>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/gallery/gallery.js')}}"></script>--}}
{{--@endsection--}}
