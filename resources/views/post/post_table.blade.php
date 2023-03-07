@extends('layouts.app')
@section('title')
    {{__('messages.post.'.$sectionName)}}
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 class="page-title d-flex align-items-center flex-wrap ms-4 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('post_format')}}"
                   class="btn btn-sm btn-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            @include('layouts.errors')
        </div>
    </div>
    <div id="kt_content_container" class="container">
        <div class="card">
            <div class="card-body pt-0 livewire-table">
                <livewire:post-table :post-type="$sectionType"/>
            </div>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script>--}}
{{--        let langId = '';--}}
{{--        let categoryId = '';--}}
{{--        let subCategoryId = '';--}}
{{--    </script>--}}
{{--    <script src="{{mix('assets/js/add_post/create_edit.js')}}"></script>--}}
{{--@endsection--}}

