@extends('front_new.layouts.app')
@section('title')
    {!! !empty($subCategory) ? $subCategory : $categoryName !!}
@endsection
@section('pageCss')
    <link href="{{asset('front_web/build/scss/sports.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="sports-page">
        <div class="breadcrumb-section pt-4">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/" class="fs-14 fw-6"><i class="fas fa-home me-1"></i>{{ __('messages.details.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="fs-14 fw-6">{{ __('messages.details.category') }}</a></li>
                        <li class="breadcrumb-item {{ empty($subCategory) ? 'active' :''}} fs-14 fw-6" aria-current="page">
                            @if(!empty($subCategory))
                                <a href="javascript:void(0)" class="fs-14 fw-6"> {!! ucfirst(trans($categoryName)) !!}</a>
                            @else
                                {!! ucfirst(trans($categoryName)) !!}
                            @endif
                        </li>
                        @if(isset($subCategory))
                            <li class="breadcrumb-item active fs-14 fw-6" aria-current="page">
                                {!! $subCategory !!}
                            </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>

        <!-- start sports-section -->
        <section class="sports-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- start sports-left-section -->
                        <section class="sports-left-section">
                            @if(isset($subName))
                                @livewire('category-page',['slug' => $slug,'subName'=>$subName])
                            @else
                                @livewire('category-page',['slug' => $slug])
                            @endif
                        </section>
                        <!-- end sports-left-section -->
                    </div>
                    <div class="col-xl-4 ">
                      @include('front_new.detail_pages.side-menu')
                    </div>
                </div>
            </div>
        </section>
        <!-- end sports-section -->
    </div>
@endsection
