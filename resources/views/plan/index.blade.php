@extends('layouts.app')
@section('title')
    {{__('messages.plans.plans')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div>
            <div class="pt-0">
                @include('flash::message')
                <livewire:plan-table/>
            </div>
        </div>
    </div>
@endsection
