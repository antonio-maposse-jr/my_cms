@extends('front_new.layouts.app')
@section('title')
    {!!  $page->name !!}
@endsection
@section('content')
    <div class="breadcrumb-section pt-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/" class="fs-14 fw-6"><i class="fas fa-home me-1"></i>{{ __('messages.details.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="fs-14 fw-6"> Pages</a></li>
                    <li class="breadcrumb-item active fs-14 fw-6">{!! $page->name !!}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="pt-60">
        <!-- start sports-section -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 front-custom-page-div">
                        <!-- start sports-left-section -->
{{--                        <section class="row">--}}
                            {!!  $page->content !!}
{{--                        </section>--}}
                        <!-- end sports-left-section -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end sports-section -->
    </div>
@endsection
