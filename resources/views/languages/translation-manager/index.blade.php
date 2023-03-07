@extends('layouts.app')
@section('title')
    {{ __('messages.translation_manager') }}    
@endsection
@push('css')
{{--    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">--}}
@endpush
@section('header_toolbar')

        <div class="container-fluid d-flex justify-content-between align-items-end mb-5">
                <h1>@yield('title')</h1>
            <a href="{{ route('languages.index') }}"
               class="btn btn-outline-primary float-end">{{ __('messages.common.back') }}</a>
            </div>

@endsection
@section('content')
    {{ Form::hidden('translationManager',$id,['id' => 'translationManagerID']) }}
    {{ Form::hidden('translationManagerLanguageName',$selectedLang,['id' => 'translationManagerLanguageName']) }}
    {{ Form::hidden('translationManagerFileName',$selectedLang,['id' => 'translationManagerFileName']) }}
    <div class="container-fluid">
        @include('flash::message')
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' => ['languages.translation.update','language'=>$id],'method'=>'post']) }}
                    @include('languages.translation-manager.fields')
                    {{ Form::close() }}
                </div>
            </div>
    </div>
@endsection
{{--@section('scripts')--}}
{{--    <script src="{{ mix('assets/js/jquery.pagination.min.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/languages/language_translate.js')}}"></script>--}}
{{--@endsection--}}

