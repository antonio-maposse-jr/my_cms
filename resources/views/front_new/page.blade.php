@extends('front_new.layouts.app')
@section('title')
    {{__('messages.setting.'.$term)}}
@endsection

@section('content')
    <div class="breadcrumb-section bg-light py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/" class="fs-14 fw-6"><i class="fas fa-home me-1"></i>{{ __('messages.details.home') }}</a></li>
                    <li class="breadcrumb-item active fs-14 fw-6">{!! __('messages.setting.'.$term) !!}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="pt-40">
        <!-- start sports-section -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        <!-- start sports-left-section -->
                        <section class="sports-left-section">
                            {!!  $termData !!}
                        </section>
                        <!-- end sports-left-section -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end sports-section -->
    </div>
@endsection
