@extends('layouts.app')
@section('title')
    {{__('messages.emoji.emojis')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div>
            <div class="pt-0">
                <livewire:emoji-table/>
            </div>
        </div>
    </div>
    @include('emojis.create-modal')
@endsection
