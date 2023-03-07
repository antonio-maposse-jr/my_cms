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
                    @can('manage_all_post')
                        <div class="row">
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('posts.index') }}"
                                   class="bg-info shadow-md rounded-10 p-xxl-10 px-5 py-10 d-flex align-items-center justify-content-between my-sm-3 my-2 text-decoration-none">
                                    <div class="bg-blue-300 widget-icon rounded-10 me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-file fs-1-xl text-white"></i>
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder text-white">{{ $posts }}</h2>
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
                                        <h2 class="fs-1-xxl fw-bolder text-white">{{ $postsDraft }}</h2>
                                        <h3 class="mb-0 fs-4 fw-light">{{ __('messages.dashboard_show.drafts') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <div class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center
                            justify-content-between my-3">
                                    <div
                                            class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-rss fs-1-xl text-white"></i>
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder text-white">{{$rss}}</h2>
                                        <h3 class="mb-0 fs-4 fw-light">{{__('messages.rss-feed')}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <div
                                        class="bg-success shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                    <div
                                            class="bg-green-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-rss fs-1-xl text-white"></i>
{{--                                        <i class="fa-solid fa-user-large-slash fs-1-xl text-white"></i>--}}
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder text-white">{{$rssPost}}</h2>
                                        <h3 class="mb-0 fs-4 fw-light">{{__('messages.on_rss_feed')}}</h3>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-12">
                                <div class="card-header border-0 pt-5 pb-1">
                                    <div class="px-2 py-2">
                                        <h3>{{ __('messages.dashboard_show.post_views') }}</h3>
                                    </div>
                                    <div id="timeRange" class="border px-2 py-2 justify-content-end">
                                        <i class="far fa-calendar-alt"
                                           aria-hidden="true"></i>&nbsp;&nbsp<span></span> <b
                                                class="caret"></b>
                                    </div>
                                </div>
                                <div class="card mb-5 mb-xl-8 p-5" id="postChartContainer" >        
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('manage_staff')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-3 mb-1">{{ __('messages.dashboard_show.recent_user') }}</span>
                                        </h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="pt-0">
                                        <!--begin::Table container-->
                                        <div class="">
                                            <!--begin::Table-->
                                            <table class="table table-striped">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fw-bolder text-muted">
                                                    <th>{{ __('messages.dashboard_show.name') }}</th>
                                                    <th>{{ __('messages.dashboard_show.email') }}</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-5">
                                                                    <img src="{{ $user->profile_image }}" alt="" width="50" height="50" class="rounded-circle object-cover">
                                                                </div>
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <span class="text-muted fw-bolder text-muted d-block fs-7">{{ $user->first_name }} </span>
                                                                    <span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->first_name }} {{ $user->last_name }}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->email }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--begin::Body-->
                                </div>
                            </div>
                        </div>
                    @endcan
            </div>
        </div>
    </div>
    @include('dashboard.templates.templates')
@endsection
@section('page_js')
    <script>
            let dashboardChartBGColor = "{{ (Auth::user()->dark_mode) ? 'rgb(28,73,113)' : 'rgb(214,237,255)'}}";
    </script>
{{--<script src="{{ asset('assets/js/chart.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>--}}
{{--<script src="{{mix('assets/js/dashboard/dashboard.js')}}"></script>--}}

@endsection
