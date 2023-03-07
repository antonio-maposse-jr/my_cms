<footer class="footer pt-60 bg-light">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-sm-7 ">
                <div class="footer-logo">
                    <a href="{{ route('front.home') }}">
                        <img src="{{$settings['logo']}}" alt="" class="img-fluid w-100 h-100" />
                    </a>
                </div>
                <p class="d-block text-gray my-4 fs-14 text-gray">
                    {!! $settings['about_text'] !!}
                </p>
            </div>
            <div class="col-lg-2 col-sm-4 mb-3  ">
                <div class="categories ps-xxl-5 ps-lg-4 ps-md-5 ms-lg-0 ms-md-5 ps-sm-4">
                    <h3 class="mb-3 text-black fw-7">{{ __('messages.categories') }}</h3>
                    <ul class="ps-0">
                        @foreach(getCategory()->take(6) as $category)
                            <li>
                                <a href="{{ route('categoryPage', $category->slug) }}" class="text-decoration-none mb-3 d-block text-gray fs-14 text:hover">{!! $category->name !!}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-10">
                <h3 class="mb-3 text-black fw-7">Recent Posts</h3>
                <div class="footer-info d-flex flex-wrap justify-content-sm-between justify-content-start">
                    @foreach(getRecentPost() as $recentPost)
                        <div class="card me-sm-0 me-4  mb-4 bg-light {{ $loop->index ? 'mb-sm-0' : '' }}">
                            <div class="card-img-top">
                                <a href="{{route('detailPage',['data' => $recentPost->slug])}}">
                                    @if($recentPost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                        <button class="common-music-icon sidebar-music-icon"
                                                type="button">
                                            <i class="icon fa-solid fa-music text-white"></i>
                                        </button>
                                        <img src="{{$recentPost->post_image}}" alt="" class="w-100 h-100">
                                    @elseif($recentPost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                        @php
                                            $thumbUrl = !empty($recentPost->postVideo) && !empty($recentPost->postVideo->thumbnail_image_url) ? $recentPost->postVideo->thumbnail_image_url : null;
                                            $thumbImage = !empty($recentPost->postVideo) && !empty($recentPost->postVideo->uploaded_thumb) ? $recentPost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                        @endphp
                                        <button class="common-music-icon sidebar-music-icon"
                                                type="button">
                                            <i class="icon fa-solid fa-play text-white"></i>
                                        </button>
                                        <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" alt="" class="w-100 h-100">
                                    @else
                                        <img src="{{$recentPost->post_image}}" alt="" class="w-100 h-100">
                                    @endif
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-title mb-1 fs-12 fw-6 text-black">
                                    <a href="{{route('detailPage',['data' => $recentPost->slug])}}" class="text-decoration-none text-black">{!! $recentPost->title !!}</a>
                                </p>
                                <span class="card-text fs-12 text-gray">{{$recentPost->created_at->format('M d Y')}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="last-line pt-60 pb-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-3 col-lg-4 col-sm-6 text-lg-start text-sm-end text-center order-2 order-lg-0">
                    <p href="#" class="fs-12 text-gray mb-0">{{__('messages.common.all_rights')}} © {{Illuminate\Support\Carbon::now()->format('Y')}} {{ $settings['application_name'] }}</p>
                </div>
                <div
                        class="col-xxl-3 col-lg-4 col-sm-6 text-lg-center text-sm-end text-center my-sm-0 my-3  order-1 order-lg-1">
                    <div class="social-icon d-flex justify-content-lg-center justify-content-sm-start justify-content-center">
                        <a href="{{$settings['facebook_url']}}" target="_blank"> <i class="fa-brands fa-facebook-f text-gray fs-18 me-xl-5 me-4"></i> </a>
                        <a href="{{$settings['twitter_url']}}" target="_blank"> <i class="fa-brands fa-twitter text-gray fs-18 me-xl-5 me-4"></i> </a>
                        <a href="{{$settings['linkedin_url']}}" target="_blank"> <i class="fa-brands fa-linkedin-in  text-gray fs-18 me-xl-5 me-4"></i></a>
                        <a href="{{$settings['pinterest_url']}}" target="_blank"> <i class="fa-brands fa-pinterest text-gray fs-18 me-xl-5 me-4"></i></a>
                        <a href="{{$settings['instagram_url']}}" target="_blank"> <i class="fa-brands fa-instagram  text-gray fs-18  me-xl-5 me-4"></i></a>
                        <a href="{{$settings['vk_url']}}" target="_blank"> <i class="fa-brands fa-vk text-gray fs-18  me-xl-5 me-4"></i></a>
                        <a href="{{$settings['telegram_url']}}" target="_blank"> <i class="fa-brands fa-telegram  text-gray fs-18  me-xl-5 me-4"></i></a>
                        <a href="{{$settings['youtube_url']}}" target="_blank"> <i class="fa-brands fa-youtube  text-gray fs-18 "></i></a>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-12 text-lg-end mb-lg-0 mb-sm-4 text-center order-0 order-lg-2">
                    <div class="desc  justify-content-center ">
                        <a href="{{route('page.Terms')}}" class="fs-12 text-gray  me-4">{{__('messages.setting.terms-conditions')}}</a>
                        <a href="{{route('page.support')}}" class="fs-12 text-gray  me-4">{{__('messages.setting.support')}}</a>
                        <a href="{{route('page.privacy')}}" class="fs-12 text-gray">{{__('messages.setting.privacy')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
