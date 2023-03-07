@extends('layouts.app')
@section('title')
    {{__('messages.add_post')}}
@endsection
@section('content')
    <div class="post d-flex flex-row-fluid post_ui">
        <div class="container-fluid">
            @include('post.post_menu')
        </div>
    </div>
@endsection

