@extends('layouts.app')
@section('title')
    {{__('messages.rss-feed')}}
@endsection

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:rss-feed-table/>
        </div>
    </div>
@endsection
