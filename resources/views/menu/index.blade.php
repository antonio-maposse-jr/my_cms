@extends('layouts.app')
@section('title')
    {{__('messages.menu.menu')}}
@endsection

@section('content')
        <div class="container-fluid">
            <div class="d-flex flex-column">
                @include('flash::message')
                <livewire:menu-table/>
            </div>
        </div>
@endsection
{{--@section('page_js')--}}
{{--    <script>--}}
{{--        let recordsURL = "{{ route('menus.index') }}";--}}
{{--    </script>--}}
{{--    <script src="{{mix('assets/js/menu/menu.js')}}"></script>--}}
{{--@endsection--}}
