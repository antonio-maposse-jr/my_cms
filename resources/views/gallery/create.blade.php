@extends('layouts.app')
@section('title')
    {{__('messages.gallery.add_images')}}
@endsection
@section('header_toolbar')
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <h1>@yield('title')</h1>
                    <a href="{{ route('gallery-images.index') }}"
                       class="btn btn-outline-primary float-end">{{ __('messages.common.back') }}</a>
            </div>
        </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('layouts.errors')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'gallery-images.store','enctype' => 'multipart/form-data']) }}
                    @include('gallery.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
{{--    <script>--}}
{{--        let isEdit = false--}}
{{--    </script>--}}
{{--    <script src="{{mix('assets/js/gallery/create_edit.js')}}"></script>--}}
{{--@endsection--}}

