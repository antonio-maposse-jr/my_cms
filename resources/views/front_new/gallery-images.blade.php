@extends('front_new.layouts.app')
@section('title')
    {{__('messages.post.gallery') }}
@endsection
@section('pageCss')
    <link href="{{asset('front_web/build/scss/gallery-details.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/lightbox.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <main class="main">
        <div class="gallery-details-page">
            <!-- start gallery-section -->
            <section class="gallery-details-section py-60">
                <div class="container">
                    @if(!empty($allSubCategory->first()))
                        <div class="section-heading border-bottom-0">
                        <div class="row align-items-center">
                            <div class="col-md-6 section-heading-left">
                                <h2 class="text-black mb-0">{!! $allSubCategory->first()->album->name !!}</h2>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(!empty($allSubCategory))
                <div class="row">
                    <div class="col-sm-11 p-0">
                        <div class="filters text-center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item ">
                                    <button class="btn fil-cat filter animation nav-category active text-black" href="javascript:void(0)"
                                            data-filter="all">{{__('messages.all')}}
                                    </button>
                                </li>
                                @if(count($allSubCategory) > 1)
                                    @foreach($allSubCategory as $category)
                                        @if($category->gallery->count())
                                            <li class="nav-item ">
                                                <button class="btn fil-cat filter animation nav-category text-black"
                                                        href="javascript:void(0)" data-rel="{{str_replace(' ','-',$category->name)}}"
                                                        data-filter=".{{str_replace(' ','-',$category->name)}}">
                                                    {!! $category->name !!}
                                                </button>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="nav-item ">
                                        <button class="btn fil-cat filter animation nav-category text-black" href="javascript:void(0)"
                                                data-rel="{{str_replace(' ','-',$allSubCategory->first()->name)}}"
                                                data-filter=".{{str_replace(' ','-',$allSubCategory->first()->name)}}">
                                            {!! $allSubCategory->first()->name !!}
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div id="portfolio" class="gallery-images column-count">
                        <div class="grid">
                            
                            @php
                            $val = 5 
                            @endphp
                            @if(!empty($galleryImages))
                                @foreach($galleryImages as $galleryImage)
                                    @foreach($galleryImage->gallery_image as $gallery)
                                       
                                        <div
                                                class="tile scale-anm {{str_replace(' ','-',$galleryImage->category->name)}}">
                                            <a href="{{$gallery}}" target="_blank" data-lightbox="gallery"
                                               class="w-100">
                                                <figure class="mb-0">
{{--                                                    <img data-src="{{$gallery}}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="lazy">--}}
                                                    <img src="{{$gallery}}" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif
                </div>
            </section>
        </div>
    </main>
@endsection
@section('script')
{{--    <script src="{{asset('assets/js/jquery.mixitup.min.js')}}"></script>--}}
{{--    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/front/gallery-page.js') }}"></script>--}}
@endsection
