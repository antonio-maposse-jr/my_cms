@extends('front_new.layouts.app')
@section('title')
    {!! !empty(getSEOTools()->home_title) ? getSEOTools()->home_title : __('messages.details.home') !!}
@endsection
@section('pageCss')
    <link href="{{asset('front_web/build/scss/home.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="home-page">
        <!-- start hero section -->
        <section class="hero-section pt-60">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sliderPosts as $sliderPost)
                                    <div class="hero-image carousel-item @if($loop->iteration <=1) active @endif position-relative ">
                                        <a href="{{ route('detailPage',$sliderPost->slug )}}">
{{--                                            <img data-src="{{ $sliderPost->post_image }}" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 lazy" alt=""/>--}}
                                            @if($sliderPost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                <button class="common-music-icon slider-music-icon" type="button">
                                                        <i class="icon fa-solid fa-music text-white"></i>
                                                </button>
                                                <img src="{{ $sliderPost->post_image }}" class="w-100 h-100" alt=""/>
                                            @elseif($sliderPost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                @php
                                                    $thumbUrl = !empty($sliderPost->postVideo) && !empty($sliderPost->postVideo->thumbnail_image_url) ? $sliderPost->postVideo->thumbnail_image_url : null;
                                                    $thumbImage = !empty($sliderPost->postVideo) && !empty($sliderPost->postVideo->uploaded_thumb) ? $sliderPost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                @endphp
                                                <button class="common-music-icon slider-music-icon"
                                                        type="button">
                                                    <i class="icon fa-solid fa-play text-white"></i>
                                                </button>
                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" class="w-100 h-100" alt=""/>
                                            @else
                                                <img src="{{ $sliderPost->post_image }}" class="w-100 h-100" alt=""/>
                                            @endif
                                        </a>
                                        <a href="{{route('categoryPage',$sliderPost->category->slug)}}" class="tags position-absolute fw-7 {{getColorClass($sliderPost->category->id)}}"  >{!! $sliderPost->category->name !!}</a>
                                        <div class="hero-content position-absolute px-40 mb-sm-4 mb-3 w-100">
                                            <h1 class="text-white pb-2"><a href="{{ route('detailPage',$sliderPost->slug )}}" class="text-decoration-none text-white">{!! \Illuminate\Support\Str::limit($sliderPost->title,85,'...') !!}</a></h1>
                                            <div class="desc d-sm-flex align-items-center justify-content-between">
                                                <p class="fs-14 text-white mb-sm-0 mb-1">{{ __('messages.common.by') }}  {{ $sliderPost->user->full_name }}</p>
                                                <div class="desc d-flex">
                                                    <p class="fs-14 text-white mb-0">{{ ucfirst(__('messages.common.'.strtolower($sliderPost->created_at->format('F')))) }} {{ $sliderPost->created_at->format('d, Y') }}</p>
                                                    <span class=" text-primary px-sm-4 px-2"> | </span>
                                                    <p class="fs-14 text-white mb-0">{{ $sliderPost->comment_count }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <i class="icon fa-solid fa-arrow-left text-white"></i>
                            </button>
                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <i class="icon fa-solid fa-arrow-right text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-lg-0  mt-sm-5 mt-4">
                        <div class="row">
                            @foreach($headlinePosts as $row)
                                <div class="col-sm-6 mb-4 pb-xl-1 ">
                                    <div class="card position-relative">
                                        <div class="card-img-top">
                                            <a href="{{route('detailPage',$row->slug)}}">
{{--                                                <img data-src="{{ $row->post_image }}" src="{{ asset('front_web/images/bg-process.png') }}" alt="" class="w-100 h-100 lazy">--}}
                                                @if($row->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                    <button class="common-music-icon small-music-icon" type="button">
                                                        <i class="icon fa-solid fa-music text-white"></i>
                                                        </button>
                                                    <img src="{{ $row->post_image }}" class="w-100 h-100" alt=""/>
                                                @elseif($row->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                    @php
                                                        $thumbUrl = !empty($row->postVideo) && !empty($row->postVideo->thumbnail_image_url) ? $row->postVideo->thumbnail_image_url : null;
                                                        $thumbImage = !empty($row->postVideo) && !empty($row->postVideo->uploaded_thumb) ? $row->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                    @endphp
                                                    <button class="common-music-icon small-music-icon"
                                                            type="button">
                                                        <i class="icon fa-solid fa-play text-white"></i>
                                                    </button>
                                                    <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" class="w-100 h-100" alt=""/>
                                                @else
                                                    <img src="{{ $row->post_image }}" class="w-100 h-100" alt=""/>
                                                @endif
                                            </a>
                                        </div>
                                        <a href="{{route('categoryPage',$row->category->slug)}}" class="tags position-absolute  fw-7 {{ getColorClass($row->category->id) }}">{!! $row->category->name !!}</a>
                                        <div class="card-body">
                                            <h5 class="card-title mb-1 fs-16 text-black fw-6">
                                                <a href="{{route('detailPage',$row->slug)}}" class="fs-16 text-black fw-6">{!! \Illuminate\Support\Str::limit(  $row->title,40,'...')  !!}</a>
                                            </h5>
                                            <span class="card-text fs-12 text-gray">{{  ucfirst(__('messages.common.'.strtolower($row->created_at->format('M')))) }} {{  $row->created_at->format('d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->
        <!-- start sub-section -->
        <section class="sub-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- start what's new-section -->
                        @if(checkAdSpaced('index_top'))
                            @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->code))
                                <div class="container index-top-desktop ad-space-url-desktop">
                                    {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->code !!}
                                </div>
                            @else
                                <div class="container index-top-desktop">
                                    <a href="{{getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->ad_url}}"
                                       target="_blank">
                                        <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->ad_banner)}}"
                                             width="800" class="img-fluid">
                                    </a>
                                </div>

                            @endif
                            @if(isset(getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->code))
                                <div class=" container index-top-mobile ad-space-url-mobile">
                                    {!! getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->code !!}
                                </div>
                            @else
                                <div class=" container index-top-mobile">
                                    <a href="{{getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->ad_url}}"
                                       target="_blank">
                                        <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->ad_banner)}}"
                                             width="350" class="img-fluid">
                                    </a>
                                </div>
                            @endif
                        @endif
                        <section class="whats-new-section pt-60">
                            @if(!empty($firstHeadlinePost))
                                <div class="section-heading pb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-md-5 section-heading-left">
                                            <h2 class="text-black">{{ __('messages.details.whats_new') }}</h2>
                                        </div>
                                        <div class="col-md-7 section-heading-right">
                                            <ul class="nav nav-tabs d-flex justify-content-md-end justify-content-between align-items-center border-0 " id="myTab" role="tablist">
                                                @foreach($postCategory as $category)
                                                    <li class="nav-item pe-4">
                                                        <button class="nav-link text-gray fs-14 fw-6 px-0 {{($loop->index == 0) ? 'active' : ''}}" id="{{$category->id}}-tab" data-bs-toggle="tab" data-bs-target="#menu-{{$category->id}}" type="button" role="tab" aria-controls="contact" aria-selected="false">{!! $category->name !!}</button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    @foreach($postCategory as $category)
                                        @php
                                            $catePost = $category->posts->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE);
                                        @endphp
                                        @if(!empty($catePost->first()))
                                            <div class="tab-pane fade new-post pt-40 {{($loop->index == 0) ? 'show active' : ''}}" id="menu-{{$category->id}}" role="tabpanel" aria-labelledby="{{$category->id}}-tab">
                                                <div class="row">
                                                    <div class="col-lg-3 d-lg-block d-sm-flex ">
                                                        @foreach($catePost->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE)->skip(1)->take(2) as $posts)
                                                            <div class="card mb-4 pb-sm-2 me-lg-0 pe-sm-1 me-sm-2">
                                                                <div class="card-img-top ">
                                                                    <a href="{{ route('detailPage',$posts->slug) }}">
{{--                                                                        <img data-src="{{$posts->post_image}}" src="{{ asset('front_web/images/bg-process.png') }}" alt="" class="w-100 h-100 lazy">--}}
                                                                        @if($posts->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                            <button class="common-music-icon small-music-icon"
                                                                                    type="button">
                                                                                <i class="icon fa-solid fa-music text-white"></i>
                                                                            </button>
                                                                            <img src="{{ $posts->post_image }}"
                                                                                 class="w-100 h-100" alt=""/>
                                                                        @elseif($posts->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                            @php
                                                                                $thumbUrl = !empty($posts->postVideo) && !empty($posts->postVideo->thumbnail_image_url) ? $posts->postVideo->thumbnail_image_url : null;
                                                                                $thumbImage = !empty($posts->postVideo) && !empty($posts->postVideo->uploaded_thumb) ? $posts->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                            @endphp
                                                                            <button class="common-music-icon small-music-icon"
                                                                                    type="button">
                                                                                <i class="icon fa-solid fa-play text-white"></i>
                                                                            </button>
                                                                            <img src="{{(!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}"
                                                                                 class="w-100 h-100" alt=""/>
                                                                        @else
                                                                            <img src="{{ $posts->post_image }}"
                                                                                 class="w-100 h-100" alt=""/>
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h5 class="card-title mb-1 fs-16 text-black fw-6">
                                                                        <a href="{{ route('detailPage',$posts->slug) }}" class="fs-16 text-black fw-6">{!! \Illuminate\Support\Str::limit($posts->title,40,'...') !!}</a>
                                                                        </h5>
                                                                    <span class="card-text fs-12 text-gray">{{ ucfirst(__('messages.common.'.strtolower($posts->created_at->format('M')))) }} {{ $posts->created_at->format('d, Y')}}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-lg-6 mb-lg-0">
                                                        @php
                                                            $middlePost = $catePost->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE)->first()
                                                        @endphp
                                                        <div class="new-post-image position-relative rounded-10">
                                                            <a href="{{route('detailPage',$middlePost->slug)}}">
{{--                                                                <img data-src="{{($middlePost->post_image) ?--}}
{{--                                                                            $middlePost->post_image :" /"}}" src="{{ asset('front_web/images/bg-process.png') }}" alt="" class="w-100 h-100 lazy" />--}}
                                                                @if($middlePost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                    <button class="common-music-icon tab-music-icon"
                                                                            type="button">
                                                                        <i class="icon fa-solid fa-music text-white"></i>
                                                                    </button>
                                                                    <img src="{{($middlePost->post_image) ?
                                                                            $middlePost->post_image :" /"}}"
                                                                         class="w-100 h-100" alt=""/>
                                                                @elseif($middlePost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                    @php
                                                                        $thumbUrl = !empty($middlePost->postVideo) && !empty($middlePost->postVideo->thumbnail_image_url) ? $middlePost->postVideo->thumbnail_image_url : null;
                                                                        $thumbImage = !empty($middlePost->postVideo) && !empty($middlePost->postVideo->uploaded_thumb) ? $middlePost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                    @endphp
                                                                    <button class="common-music-icon tab-music-icon"
                                                                            type="button">
                                                                        <i class="icon fa-solid fa-play text-white"></i>
                                                                    </button>
                                                                    <img src="{{(!empty($thumbUrl) ? $thumbUrl : $thumbImage) }}"
                                                                         class="w-100 h-100" alt=""/>
                                                                @else
                                                                    <img src="{{($middlePost->post_image) ?
                                                                            $middlePost->post_image :" /"}}"
                                                                         class="w-100 h-100" alt=""/>
                                                                @endif
                                                            </a>
                                                            <a href="{{route('detailPage',$middlePost->slug)}}" class="overlay">
                                                            </a>
                                                            <div class="new-post-content position-absolute px-30 mb-3 pb-1">
                                                                <h3 class="text-white pb-sm-2">
                                                                    <a href="{{route('detailPage',$middlePost->slug)}}" class="text-white">{!! $middlePost->title !!}</a>
                                                                    </h3>
                                                                <div class="desc d-sm-flex align-items-center justify-content-between">
                                                                    <p class="fs-14 text-white mb-sm-0 mb-1">
                                                                        {{ ucfirst(__('messages.common.'.strtolower($middlePost->created_at->format('M')))) }} {{ $middlePost->created_at->format('d, Y') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 d-lg-block d-sm-flex mt-lg-0 mt-sm-5 mt-4">
                                                        @foreach($catePost->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE)->skip(3)->take(2) as $posts)
                                                            <div class="card mb-md-0 pb-md-0 mb-lg-4 pb-lg-2 mb-sm-0 pb-sm-0 mb-4 pb-sm-2 me-lg-0 pe-sm-1 me-sm-2">
                                                                <div class="card-img-top ">
                                                                    <a href="{{ route('detailPage',$posts->slug) }}">
{{--                                                                        <img data-src="{{$posts->post_image}}" src="{{ asset('front_web/images/bg-process.png') }}" alt=""--}}
{{--                                                                             class="w-100 h-100 lazy">--}}
                                                                        @if($middlePost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                            <button class="common-music-icon small-music-icon"
                                                                                    type="button">
                                                                                <i class="icon fa-solid fa-music text-white "></i>
                                                                            </button>
                                                                            <img src="{{$posts->post_image}}"
                                                                                 class="w-100 h-100" alt=""/>
                                                                        @elseif($middlePost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                            @php
                                                                                $thumbUrl = !empty($middlePost->postVideo) && !empty($middlePost->postVideo->thumbnail_image_url) ? $middlePost->postVideo->thumbnail_image_url : null;
                                                                                $thumbImage = !empty($middlePost->postVideo) && !empty($middlePost->postVideo->uploaded_thumb) ? $middlePost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                            @endphp
                                                                            <button class="common-music-icon small-music-icon"
                                                                                    type="button">
                                                                                <i class="icon fa-solid fa-play text-white "></i>
                                                                            </button>
                                                                            <img src="{{(!empty($thumbUrl) ? $thumbUrl : $thumbImage) }}"
                                                                                 class="w-100 h-100" alt=""/>
                                                                        @else
                                                                            <img src="{{$posts->post_image}}"
                                                                                 class="w-100 h-100" alt=""/>
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h5 class="card-title mb-1 fs-16 text-black fw-6">
                                                                        <a href="{{ route('detailPage',$posts->slug) }}" class="fs-16 text-black fw-6">{!! \Illuminate\Support\Str::limit($posts->title,40,'...') !!}</a></h5>
                                                                    <span class="card-text fs-12 text-gray">{{ ucfirst(__('messages.common.'.strtolower($posts->created_at->format('M')))) }} {{ $posts->created_at->format('d, Y') }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </section>
                        <!-- end what's new-section -->
                        @if(checkAdSpaced('index_top'))
                            @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->code))
                                <div class="container index-top-desktop ad-space-url-desktop">
                                    {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->code !!}
                                </div>
                            @else
                                <div class="container index-top-desktop">
                                    <a href="{{getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->ad_url}}"
                                       target="_blank">
                                        <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_TOP)->ad_banner)}}"
                                             width="800" class="img-fluid">
                                    </a>
                                </div>
                               
                            @endif
                                @if(isset(getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->code))
                                    <div class=" container index-top-mobile ad-space-url-mobile">
                                        {!! getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->code !!}
                                    </div>
                                @else
                                <div class=" container index-top-mobile">
                                    <a href="{{getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->ad_url}}"
                                       target="_blank">
                                        <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::INDEX_TOP)->ad_banner)}}"
                                             width="350" class="img-fluid">
                                    </a>
                                </div>
                                @endif

                        @endif
                        <!-- start technology-section -->
                        @foreach($categories as $category)
                            @if(!$category->posts->isEmpty())
                                <section class="technology-section pt-60">
                                    <div class="section-heading border-bottom-0">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 section-heading-left">
                                                <h2 class="text-black mb-0">{!! $category->name !!}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="technology-post pt-40">
                                        <div class="row">
                                            @php
                                                $range = getCategoryNumbers(range(1,$category->posts->count()));
                                            @endphp
                                            @foreach($category->posts->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE) as $categoryPost)
                                                <div class="{{ in_array($loop->iteration,$range) ? 'col-lg-7 ' : 'col-lg-5' }} mb-4 pb-lg-0 pb-sm-3">
                                                    <div class="post-image position-relative rounded-10">
                                                        <a href="{{ route('detailPage',$categoryPost->slug) }}">
{{--                                                            <img data-src="{{ $categoryPost->post_image }}"--}}
{{--                                                                 alt="" src="{{ asset('front_web/images/bg-process.png') }}"--}}
{{--                                                                 class="w-100 h-100 lazy"/>--}}
                                                            @if($categoryPost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                <button class="common-music-icon medium-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-music text-white"></i>
                                                                </button>
                                                                <img src="{{$categoryPost->post_image}}"
                                                                     class="w-100 h-100" alt=""/>
                                                            @elseif($categoryPost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                @php
                                                                    $thumbUrl = !empty($categoryPost->postVideo) && !empty($categoryPost->postVideo->thumbnail_image_url) ? $categoryPost->postVideo->thumbnail_image_url : null;
                                                                    $thumbImage = !empty($categoryPost->postVideo) && !empty($categoryPost->postVideo->uploaded_thumb) ? $categoryPost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                @endphp
                                                                <button class="common-music-icon medium-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-play text-white "></i>
                                                                </button>
                                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}"
                                                                     class="w-100 h-100" alt=""/>
                                                            @else
                                                                <img src="{{$categoryPost->post_image}}"
                                                                     class="w-100 h-100" alt=""/>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('detailPage',$categoryPost->slug) }}" class="overlay">
                                                        </a>
                                                        <div class="post-content position-absolute px-30 mb-3 pb-1">
                                                            <h3 class="text-white pb-sm-2">
                                                                <a href="{{ route('detailPage',$categoryPost->slug) }}" class="text-white">{!!  $categoryPost->title !!}</a>
                                                            </h3>
                                                            <div class="desc d-sm-flex align-items-center justify-content-between">
                                                                <p class="fs-12 text-white mb-sm-0 mb-1">
                                                                    {{ __('messages.common.by') }} {{ $categoryPost->user->full_name }}</p>
                                                                <p class="fs-12 text-white mb-0">{{ ucfirst(__('messages.common.'.strtolower($categoryPost['created_at']->format('M')))) }} {{ $categoryPost['created_at']->format('d, Y') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($loop->iteration >= 4)
                                                    @break
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            @endif
                        @endforeach
                        <!-- end technology-section -->
                    
                        @if(checkAdSpaced('index_bottom'))
                            @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->code))
                                <div class="container index-top-desktop ad-space-url-desktop">
                                    {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->code !!}
                                </div>
                            @else
                            <div class="container index-top-desktop">
                                
                                <a href="{{getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_url}}"
                                   target="_blank">
                                    <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_banner)}}"
                                         width="800" class="img-fluid">
                                </a>
                            </div>
                            @endif
                                @if(isset(getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->code))
                                    <div class=" container index-top-mobile ad-space-url-mobile">
                                        {!! getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->code !!}
                                    </div>
                                @else
                            <div class=" container index-top-mobile">
                                <a href="{{getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_url}}"
                                   target="_blank">
                                    <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_banner)}}"
                                         width="350" class="img-fluid">
                                </a>
                            </div>
                                @endif
                        @endif
                        <!-- start latest-news-section -->
                        @if( isset($latestPosts) && !$latestPosts->isEmpty())
                            <section class="latest-news-section pt-60">
                                <div class="section-heading border-bottom-0">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 section-heading-left">
                                            <h2 class="text-black mb-0">{{ __('messages.details.latest_news') }}</h2>
                                        </div>
                                        <div class=" col-sm-6 text-end">
                                            <a href="{{ route('allPosts') }}" class="fs-14 btn fw-6">{{ __('messages.details.view_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest-news-post pt-40">
                                    <div class="row">
                                        @foreach($latestPosts as $latestPost)
                                            <div class="col-lg-6 mb-sm-5 mb-4 pb-lg-0 pb-sm-3">
                                                <div class="card position-relative">
                                                    <div class="news-post-image rounded-10">
                                                        <a href="{{route('detailPage',$latestPost->slug)}}">
{{--                                                            <img data-src="{{$latestPost->post_image}}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 lazy">--}}
                                                            @if($latestPost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                <button class="common-music-icon all-posts-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-music text-white "></i>
                                                                </button>
                                                                <img src="{{$latestPost->post_image}}"
                                                                     class="w-100 h-100" alt=""/>
                                                            @elseif($latestPost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                @php
                                                                    $thumbUrl = !empty($latestPost->postVideo) && !empty($latestPost->postVideo->thumbnail_image_url) ? $latestPost->postVideo->thumbnail_image_url : null;
                                                                    $thumbImage = !empty($latestPost->postVideo) && !empty($latestPost->postVideo->uploaded_thumb) ? $latestPost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                @endphp
                                                                <button class="common-music-icon all-posts-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-play text-white "></i>
                                                                </button>
                                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}"
                                                                     class="w-100 h-100" alt=""/>
                                                            @else
                                                                <img src="{{$latestPost->post_image}}"
                                                                     class="w-100 h-100" alt=""/>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <a href="{{route('categoryPage',$latestPost->category->slug)}}" class="tags position-absolute fw-7">{{ $latestPost->category->name }}</a>
                                                    <div class="news-post-content">
                                                        <h3 class="text-black py-2 fw-7 mb-0 ">
                                                            <a href="{{route('detailPage',$latestPost->slug)}}" class="text-black py-2 fw-7">{!! $latestPost->title!!}</a>
                                                        </h3>
                                                        <p class="fs-14 text-gray mb-0 pb-2">
                                                            {!! Str::limit($latestPost->description,220) !!}
                                                        </p>
                                                        <div class="desc d-flex">
                                                            <p class="fs-14 text-black mb-0">{{ __('messages.common.by') }} {{$latestPost->user->full_name}}</p>
                                                            <span class=" text-primary  px-2"> | </span>
                                                            <p class="fs-14 text-black mb-0">{{ ucfirst(__('messages.common.'.strtolower($latestPost->created_at->format('M')))) }} {{ $latestPost->created_at->format('d , Y') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        @endif
                        <!-- end latest-news-section -->
                        @if(checkAdSpaced('index_bottom'))
                            @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->code))
                                <div class="container index-top-desktop ad-space-url-desktop">
                                    {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->code !!}
                                </div>
                            @else
                                <div class="container index-top-desktop">

                                    <a href="{{getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_url}}"
                                       target="_blank">
                                        <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_banner)}}"
                                             width="800" class="img-fluid">
                                    </a>
                                </div>
                            @endif
                            @if(isset(getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->code))
                                <div class=" container index-top-mobile ad-space-url-mobile">
                                    {!! getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->code !!}
                                </div>
                            @else
                                <div class=" container index-top-mobile">
                                    <a href="{{getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_url}}"
                                       target="_blank">
                                        <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::INDEX_BOTTOM)->ad_banner)}}"
                                             width="350" class="img-fluid">
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="col-lg-4">
                        @include('front_new.layouts.side-menu')
                    </div>
                </div>
            </div>
        </section>

        <!-- start featured-post-section -->
        @if(!$featurePostCategory->isEmpty())
            <section class="featured-post-section py-60">
                <div class="container">
                    <div class="section-heading pb-3">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-6 section-heading-left">
                                <h2 class="text-black">{{ __('messages.details.featured_post') }}</h2>
                            </div>
                            <div class="col-md-6 section-heading-right">
                                <ul class="nav nav-tabs d-flex justify-content-md-end justify-content-between align-items-center border-0 " id="myTab" role="tablist">
                                    @foreach($featurePostCategory as $category)
                                        <li class="nav-item pe-md-5 pe-4">
                                            <button class="nav-link text-gray fs-14 fw-6 px-0 {{($loop->index == 0) ? 'active' : ''}}" id="{{$category->id}}-f-tab" data-bs-toggle="tab" data-bs-target="#menu-f-{{$category->id}}" type="button" role="tab" aria-controls="contacts" aria-selected="false">{!! $category->name !!}</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        @foreach($featurePostCategory as $category)
                            @php
                                $featCatePost = $category->posts->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE);
                            @endphp
                            @if(!empty($featCatePost->first()))
                                <div class="tab-pane fade featured-post pt-60 {{($loop->index == 0) ? 'show active' : ''}}" id="menu-f-{{$category->id}}" role="tabpanel" aria-labelledby="{{$category->id}}-f-tab">
                                    <div class="row">
                                        <div class="col-lg-3 d-lg-block d-sm-flex">
                                            @foreach($featCatePost->where('featured', 1)->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE)->skip(1)->take(2) as $posts)
                                                <div class="card mb-4 pb-sm-2 me-lg-0 pe-sm-1 me-sm-2">
                                                    <div class="card-img-top ">
                                                        <a href="{{ route('detailPage',$posts->slug) }}">
{{--                                                            <img data-src="{{$posts->post_image}}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 lazy">--}}
                                                            @if($posts->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                <button class="common-music-icon small-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-music text-white "></i>
                                                                </button>
                                                                <img src="{{$posts->post_image}}" class="w-100 h-100"
                                                                     alt=""/>
                                                            @elseif($posts->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                @php
                                                                    $thumbUrl = !empty($posts->postVideo) && !empty($posts->postVideo->thumbnail_image_url) ? $posts->postVideo->thumbnail_image_url : null;
                                                                    $thumbImage = !empty($posts->postVideo) && !empty($posts->postVideo->uploaded_thumb) ? $posts->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                @endphp
                                                                <button class="common-music-icon small-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-play text-white "></i>
                                                                </button>
                                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" class="w-100 h-100"
                                                                     alt=""/>
                                                            @else
                                                                <img src="{{$posts->post_image}}" class="w-100 h-100"
                                                                     alt=""/>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-1 fs-16 text-black fw-6">
                                                            <a href="{{ route('detailPage',$posts->slug) }}" class="fs-16 text-black fw-6">{!! \Illuminate\Support\Str::limit($posts->title,40,'...') !!}</a>
                                                        </h5>
                                                        <span class="card-text fs-12 text-gray">{{ ucfirst(__('messages.common.'.strtolower($posts->created_at->format('M')))) }} {{ $posts->created_at->format('d, Y') }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-6 mb-lg-0">
                                            @php
                                                $middleFeaturePost = $featCatePost->where('featured', 1)->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE)->first()
                                            @endphp
                                            <div class="featured-post-image position-relative rounded-10">
                                                <a href="{{route('detailPage',$middleFeaturePost->slug)}}">
{{--                                                    <img data-src="{{($middleFeaturePost->post_image) ?--}}
{{--                                                                            $middleFeaturePost->post_image :" /"}}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 lazy" />--}}
                                                    @if($middleFeaturePost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                        <button class="common-music-icon tab-music-icon"
                                                                type="button">
                                                            <i class="icon fa-solid fa-music text-white "></i>
                                                        </button>
                                                        <img src="{{($middleFeaturePost->post_image) ?
                                                              $middleFeaturePost->post_image :" /"}}"
                                                             class="w-100 h-100" alt=""/>
                                                    @elseif($middleFeaturePost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                        @php
                                                            $thumbUrl = !empty($middleFeaturePost->postVideo) && !empty($middleFeaturePost->postVideo->thumbnail_image_url) ? $middleFeaturePost->postVideo->thumbnail_image_url : null;
                                                            $thumbImage = !empty($middleFeaturePost->postVideo) && !empty($middleFeaturePost->postVideo->uploaded_thumb) ? $middleFeaturePost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                        @endphp
                                                        <button class="common-music-icon tab-music-icon"
                                                                type="button">
                                                            <i class="icon fa-solid fa-play text-white "></i>
                                                        </button>
                                                        <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}"
                                                             class="w-100 h-100" alt=""/>
                                                    @else
                                                        <img src="{{($middleFeaturePost->post_image) ?
                                                              $middleFeaturePost->post_image :" /"}}"
                                                             class="w-100 h-100" alt=""/>
                                                    @endif
                                                </a>
                                                <a href="{{route('detailPage',$middleFeaturePost->slug)}}" class="overlay">
                                                </a>
                                                <div class="featured-post-content position-absolute px-30 mb-3 pb-1">
                                                    <h3 class="text-white pb-sm-2">
                                                        <a href="{{ route('detailPage',$middleFeaturePost->slug) }}" class="text-white">{!!  $middleFeaturePost->title !!}</a>
                                                        </h3>
                                                    <div class="desc d-sm-flex align-items-center justify-content-between">
                                                        <p class="fs-14 text-white mb-sm-0 mb-1">
                                                            {{ ucfirst(__('messages.common.'.strtolower($middleFeaturePost->created_at->format('M')))) }} {{ $middleFeaturePost->created_at->format('d, Y') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 d-lg-block d-sm-flex mt-lg-0 mt-sm-5 mt-4">
                                            @foreach($featCatePost->where('featured', 1)->where('visibility',\App\Models\Post::VISIBILITY_ACTIVE)->skip(3)->take(2) as $posts)
                                                <div class="card mb-md-0 pb-md-0 mb-lg-4 pb-lg-2 mb-sm-0 pb-sm-0 mb-4 pb-sm-2 me-lg-0 pe-sm-1 me-sm-2">
                                                    <div class="card-img-top ">
                                                        <a href="{{ route('detailPage',$posts->slug) }}">
{{--                                                            <img data-src="{{$posts->post_image}}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 lazy">--}}
                                                            @if($posts->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                <button class="common-music-icon small-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-music text-white "></i>
                                                                </button>
                                                                <img src="{{$posts->post_image}}" class="w-100 h-100"
                                                                     alt=""/>
                                                            @elseif($posts->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                @php
                                                                    $thumbUrl = !empty($posts->postVideo) && !empty($posts->postVideo->thumbnail_image_url) ? $posts->postVideo->thumbnail_image_url : null;
                                                                    $thumbImage = !empty($posts->postVideo) && !empty($posts->postVideo->uploaded_thumb) ? $posts->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                @endphp
                                                                <button class="common-music-icon small-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-play text-white "></i>
                                                                </button>
                                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" class="w-100 h-100"
                                                                     alt=""/>
                                                            @else
                                                                <img src="{{$posts->post_image}}" class="w-100 h-100"
                                                                     alt=""/>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-1 fs-16 text-black fw-6">
                                                            <a href="{{ route('detailPage',$posts->slug) }}" class="fs-16 text-black fw-6">{!! \Illuminate\Support\Str::limit($posts->title,40,'...') !!}</a>
                                                        </h5>
                                                        <span class="card-text fs-12 text-gray">{{ ucfirst(__('messages.common.'.strtolower($posts->created_at->format('M')))) }} {{ $posts->created_at->format('d, Y') }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                    @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- end featured-post-section -->

        <!-- start blog-section -->
        <section class="blog-section bg-black py-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6  col-lg-8 text-center">
                        <div class="blog">
                            <h2 class="fw-7 text-white pb-lg-3 mb-md-4 mb-3">{{ __('messages.common.get_the_best') }}
                            </h2>
                            <div class="email-box position-relative">
                                {{ Form::open(['route' => 'subscribe.store','class'=>'subscribe-form-style-2',                                           'id'=>'subscriberForm']) }}
                                <input type="email" class="fs-14 text-gray subscribe-form" name="email" id="email_2" placeholder="{{ __('messages.common.your_email') }}" required>
                                <button type="submit"
                                        class="button btn-primary d-none d-sm-block position-absolute fs-14 subscribe-btn">{{ __('messages.common.subscribe') }}</button>
                                <button type="submit"
                                        class="button btn-primary d-flex align-items-center justify-content-center px-3 d-sm-none position-absolute subscribe-btn">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                                <div class="form-response1" id="formResponse"></div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end blog-section -->
        <!-- end sub-section -->
    </div>
@endsection
@section('script')
{{--    <script src="{{ mix('assets/js/front/home.js') }}"></script>--}}
@endsection
