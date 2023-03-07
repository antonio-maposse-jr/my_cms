@extends('layouts.app')
@section('title')
    {{ __('sub-categories') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:sub-category-table/>
        </div>
    </div>
    @include('sub_category.create_modal')
    @include('sub_category.edit_modal')
    @include('layouts.templates.actions')
@endsection
<script>
</script>
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/sub_category/sub_category.js')}}"></script>--}}
{{--@endsection--}}

