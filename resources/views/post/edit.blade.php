@extends('layouts.app')
@section('title')
    {{__('messages.post.edit_'.$post->type_name)}}
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
                <a class="btn btn-outline-primary float-end" href="{{ route('customer-posts.index')}}">
                    {{ __('messages.common.back') }}
                </a>
            @endif
            @if(!Auth::user()->hasRole('customer'))
                <a class="btn btn-outline-primary float-end" href="{{ route('posts.index')}}">
                    {{ __('messages.common.back') }}
                </a>
            @endif
        </div>
    </div>
@endsection
@section('content')

<div class="container-fluid">
    
    @include('layouts.errors')
    {{ Form::hidden('postEditIsEdit',false,['id' => 'galleryEditIsEdit']) }}
    {{ Form::hidden('postEditLangId',$post->lang_id,['id' => 'postEditLangId']) }}
    {{ Form::hidden('postEditCategoryId',$post->category_id,['id' => 'postEditCategoryId']) }}
    {{ Form::hidden('postEditSubCategoryId',$post->sub_category_id,['id' => 'postEditSubCategoryId']) }}
    
    {{ Form::open(['route' => ['posts.update', $post->id], 'method' => 'put','files' => 'true','id' => 'updatePostForm' ]) }}
    @csrf
        <input type="hidden" id="postSectionType" name="post_types" value="{{ $post->post_types}}">
        <div class="row">
            @include('post.fields')
        </div>
</div>
    {{ Form::close() }}
@endsection
{{--@section('page_js')--}}

{{--    <script src="{{asset('/web/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/add_post/create_edit.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/tagify.js') }}"></script>--}}
{{--@endsection--}}
