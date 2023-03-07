<!DOCTYPE html>
@php
    $settings = App\Models\Setting::pluck('value','key')->toArray();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ getAppName() }} </title>
    <!-- Favicon -->
    <link rel="icon" href="{{ getSettingValue()['logo'] }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!-- General CSS Files -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front_web/css/custom.css') }}">
    
    <!-- CSS Libraries -->
    @stack('css')
</head>
@php $style = 'style' @endphp
<body>
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid">
        <div class="d-flex flex-column flex-row-fluid">
            <div class="content d-flex flex-column flex-column-fluid pt-7">
                <div class='d-flex flex-wrap flex-column-fluid'>
                    @yield('content')
                </div>
            </div>
            <div class='container-fluid'>
                <footer class="border-top w-100 pt-4 mt-7 text-center">
                    <p class="fs-6 text-gray-600">{{$settings['copy_right_text']}} <a href="{{route('front.home')}}"
                                                                                      class="text-decoration-none">
                            {{$settings['application_name']}}</a>
                    </p>
                </footer>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('assets/js/third-party.js') }}"></script>
<script src="{{ mix('assets/js/auth-pages.js') }}"></script>
<script src="{{ asset('messages.js') }}"></script>
{{--<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>--}}

{{--<script src="{{ asset('assets/js/users/user-profile.js') }}"></script>--}}
{{--<script src="{{ mix('assets/js/custom/custom.js') }}"></script>--}}
{{--<script src="{{ mix('assets/js/side_bar_menu_search/side_bar_menu_search.js') }}"></script>--}}
{{--<script src="{{ asset('web/plugins/global/plugins.bundle.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/scripts.bundle.js') }}"></script>--}}
@stack('scripts')
<script>
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
</script>
</body>
</html>

