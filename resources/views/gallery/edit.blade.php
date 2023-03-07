@extends('layouts.app')
@section('title')
    {{__('messages.gallery.edit_images')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid ">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('gallery-images.index') }}"
                   class="btn  btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>

@endsection
@section('content')
    {{ Form::hidden('galleryEditIsEdit',true,['id' => 'galleryEditIsEdit']) }}
    {{ Form::hidden('galleryEditLangId',$gallery->lang_id ,['id' => 'galleryEditLangId']) }}
    {{ Form::hidden('galleryEditAlbumId',$gallery->album_id,['id' => 'galleryEditAlbumId']) }}
    {{ Form::hidden('galleryEditCategoryId',$gallery->category_id,['id' => 'galleryEditCategoryId']) }}
   
    <div class="container-fluid">
        @include('layouts.errors')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['gallery-images.update', $gallery->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
                @include('gallery.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{{--    <script>--}}
{{--        let isEdit = true--}}
{{--        let langId = '{{ $gallery->lang_id }}'--}}
{{--        let albumId = '{{ $gallery->album_id }}'--}}
{{--        let categoryId = '{{ $gallery->category_id }}'--}}
{{--    </script>--}}
{{--    <script src="{{mix('assets/js/gallery/create_edit.js')}}"></script>--}}
@endsection
