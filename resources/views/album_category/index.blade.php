@extends('layouts.app')
@section('title')
    {{__('messages.album_categories')}}
@endsection

@section('content')
        <div class="container-fluid">
            @include('flash::message')
            <div>
                <div class="pt-0">
                    <livewire:album-category-table/>
                </div>
            </div>
        </div>
   
    @include('album_category.create-modal')
    @include('album_category.edit-modal')
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/album-category/album-category.js')}}"></script>--}}
{{--@endsection--}}
