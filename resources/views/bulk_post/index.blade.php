@extends('layouts.app')
@section('title')
    {{__('messages.bulk_post.bulk_post')}}
@endsection

@section('content')

    <div class="container-fluid">
        @include('flash::message')
        @include('layouts.errors')
        <div class="card">
            <div class="card-body">
                <div>
                    <h2>{{__('messages.bulk_post.bulk_post_upload')}}</h2>
                </div>
                @include('bulk_post.fields')
            </div>
        </div>
    </div>
    @include('bulk_post.ids-model')
@endsection
