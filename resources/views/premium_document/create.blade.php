@extends('layouts.app')
@section('title')
    Edit Document
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">{{__('Novo Documento')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-outline-primary float-end"
                   href="{{ route('premium-documents.index') }}">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('layouts.errors')
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'premium-documents.store', 'id' => 'documentFormSubmit']) !!}
                    @include('premium_document.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
