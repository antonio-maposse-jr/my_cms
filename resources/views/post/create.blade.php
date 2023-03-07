@extends('layouts.app')
@section('title')
    {{__('messages.post.'.$sectionAdd)}}
@endsection
@section('page_css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tagify.css') }}">--}}
@endsection
@php $styleCss = 'style' @endphp
@section('header_toolbar')
    
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            @if(Auth::user()->hasRole('customer'))
                <a class="btn btn-outline-primary float-end" href="{{ route('customer.post_format')}}">
                    {{ __('messages.common.back') }}
                </a>
            @endif
            @if(!Auth::user()->hasRole('customer'))
                <a class="btn btn-outline-primary float-end" href="{{ route('post_format')}}">
                    {{ __('messages.common.back') }}
                </a>
            @endif
            
           
        </div>
    </div>
@endsection
@section('content')
    {{--    {{ Form::hidden('postEditIsEdit',false,['id' => 'galleryEditIsEdit']) }}--}}
    {{--    {{ Form::hidden('postEditLangId',old('lang_id'),['id' => 'postEditLangId']) }}--}}
    {{--    {{ Form::hidden('postEditCategoryId',old('category_id'),['id' => 'postEditCategoryId']) }}--}}
    {{--    {{ Form::hidden('postEditSubCategoryId',old('sub_category_id'),['id' => 'postEditSubCategoryId']) }}--}}
    <div class="container-fluid create-post-container">
        <div class="row">
            <div class="col-12">
                @include('layouts.errors')
            </div>
        </div>
       
        
        @if(Auth::user()->hasRole('customer'))
            {{ Form::open(['route' => 'customer-posts.store','files' => 'true','method'=>'POST','id' => 'createPostForm']) }}
        @endif
        @if(!Auth::user()->hasRole('customer'))
            {{Form::open(['route' => 'posts.store','files' => 'true','method'=>'POST','id' => 'createPostForm']) }}
        @endif
        <input type="hidden" id="postSectionType" name="post_types"
               value="{{ (!empty($sectionType)) ? $sectionType : \App\Models\Post::POST_TYPE_DEACTIVA }}">
        <div class="row">
            @include('post.fields')
        </div>
        {{ Form::close() }}
    </div>
@endsection
@section('page_js')

    {{--    <script src="{{asset('/web/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>--}}
    {{--    <script src="{{mix('assets/js/add_post/create_edit.js')}}"></script>--}}
    {{--    <script src="{{ mix('assets/js/tagify.js') }}"></script>--}}
@endsection

