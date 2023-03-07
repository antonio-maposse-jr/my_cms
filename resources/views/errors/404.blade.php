<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="{{ getAppName() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404 Not Found | {{(!empty(getSEOTools()->site_title)) ? getSEOTools()->site_title : getAppName()}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/scss/bootstrap.css')}}">
    <link href="{{asset('front_web/build/scss/dark-mode.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front_web/build/scss/custom.css')}}" rel="stylesheet" type="text/css"></head>
<body>
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img src="{{ asset('images/404-error.svg') }}"
                 class="img-404 mx-auto" height="500" width="500">
        </div>
        <div class="col-md-12 text-center error-page-404">
            <h2>Opps! Something's missing...</h2>
            <p class="not-found-subtitle">The page you are looking for doesn't exists / isn't available / was loading
                incorrectly.</p>
            <a class="btn btn-primary back-btn mt-3" href="{{ url()->previous() }}">Back to Previous Page</a>
        </div>
    </div>
</div>

</body>
</html>
