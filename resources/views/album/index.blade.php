@extends('layouts.app')
@section('title')
    {{__('messages.albums')}}
@endsection

@section('content')
        @include('flash::message')
    <div class="container-fluid">
        <div>
            
            <div class="pt-0">
                <livewire:album-table/>
            </div>
        </div>
    </div>
    @include('album.create-modal')
    @include('album.edit-modal')
@endsection
{{--@section('page_js')--}}
{{--    --}}
{{--    <script src="{{mix('assets/js/album/album.js')}}"></script>--}}
{{--@endsection--}}
