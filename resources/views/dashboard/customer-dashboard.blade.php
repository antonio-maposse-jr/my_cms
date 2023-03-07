@extends('layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('pageCss')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                {{ Form::hidden('dashboardChartBGColor',(Auth::user()->dark_mode) ? 'rgb(28,73,113)' : 'rgb(214,237,255)',['id' => 'dashboardChartBGColor']) }}
                <div class="col-12">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                            <a href="{{ route('customer-posts.index') }}"
                               class="bg-info shadow-md rounded-10 p-xxl-10 px-5 py-10 d-flex align-items-center justify-content-between my-sm-3 my-2 text-decoration-none">
                                <div class="bg-blue-300 widget-icon rounded-10 me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-file fs-1-xl text-white"></i>
                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-1-xxl fw-bolder text-white">{{$posts}}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.dashboard_show.posts') }}</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                            <div class="bg-warning shadow-md rounded-10 p-xxl-10 px-5 py-10 d-flex align-items-center justify-content-between my-sm-3 my-2">
                                <div class="bg-yellow-300 widget-icon rounded-10 me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fab fa-firstdraft fs-1-xl text-white"></i>
                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-1-xxl fw-bolder text-white">{{$postsDraft}}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.dashboard_show.drafts') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
<script>
    let dashboardChartBGColor = "{{ (Auth::user()->dark_mode) ? 'rgb(28,73,113)' : 'rgb(214,237,255)'}}"
</script>
@endsection
