@extends('layouts.app')
@section('title')
   Premium Documents
@endsection
@section('content')
    <div class="container-fluid">
        <div>
            <div class="pt-0">
                @include('flash::message')
                <livewire:premium-document-table/>
            </div>
        </div>
    </div>
@endsection
