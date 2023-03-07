@extends('layouts.app')
@section('title')
    {{ __('messages.user.profile_details') }}
@endsection
@php $styleCss = 'style' @endphp
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('flash::message')
                @include('layouts.errors')
                <div class="card">
                    {{ Form::open(['route' => 'update.profile.setting','method' => 'PUT', 'id' => 'profileId', 'files' => true]) }}
                    <div class="collapse show">
                        <div class="card-body p-9">
                            <div class="row mb-6">
                                {{ Form::label('Avatar', __('messages.user.avatar').':',  ['class'=> 'col-lg-4 form-label ']) }}
                                <div class="col-lg-8">
                                    <div class="mb-3" io-image-input="true">
                                        <div class="col-lg-8 mb-6">
                                            <div class="d-block">
                                                <div class="image-picker">
                                                    @php
                                                        $style = 'style="background-image: url('.($user->profile_image).')"';
                                                    @endphp
                                                    <div class="image previewImage" id="bgImage"
                                                         {!! $style !!}>
                                                    </div>
                                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                                          data-placement="top" 
                                                          data-bs-original-title="{{__('messages.common.change_profile')}}">
                                                        <label>
                                                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                                             <input type="file" name="image"
                                                                    class="image-upload d-none"
                                                                    accept=".png, .jpg, .jpeg">
                                                             {{ Form::hidden('avatar_remove') }}
                                                        </label>
                                                    </span>
                                                </div>
                                                <div class="form-text">{{__('messages.common.allowed_types')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label  required">{{ __('messages.user.full_name').':' }}</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {{ Form::text('first_name', $user->first_name, ['class'=> 'form-control ', 'placeholder' => __('messages.user.full_name'), 'required']) }}
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {{ Form::text('last_name', $user->last_name, ['class'=> 'form-control ', 'placeholder' => __('messages.staff.last_name'), 'required']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required ">{{ __('messages.user.email').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    {{ Form::email('email', $user->email, ['class'=> 'form-control', 'placeholder' => __('messages.user.email'), 'required']) }}
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required ">{{ __('messages.user.contact_number').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div>
                                        {{ Form::tel('contact', $user->contact,['class' => 'form-control','placeholder' => __('messages.user.contact_number'),'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex py-6 px-9">
                            {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                            <a href="{{ url()->previous() }}" type="reset"
                               class="btn btn-secondary">{{__('messages.common.discard')}}</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
