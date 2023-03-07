@extends('layouts.app')
@section('title')
    {{ __('messages.languages') }}
@endsection

@section('content')
            <div class="container-fluid">
                @include('flash::message')
                <div>
                    <div class="pt-0">
                    <livewire:language-table/>
                    </div>
                </div>
            </div>
      
    @include('languages.add_modal')
    @include('languages.edit_modal')
@endsection
{{--@section('scripts')--}}
{{--    <script src="{{ mix('assets/js/languages/languages.js')}}"></script>--}}
{{--@endsection--}}
