@extends('front_new.layouts.app')
@section('title')
    {!! $postDetail->title !!}
@endsection
@section('meta_image')
    {{ $postDetail->post_image }}
@endsection
@section('meta_tags')
    {!! $postDetail->tags !!}
@endsection
@section('meta_description')
    {!! $postDetail->description !!}
@endsection
@section('content')
    @php
        $settings = getSettingValue();
    @endphp
    <div class="news-details-page mb-20">
        <div class="breadcrumb-section pt-4">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/" class="fs-14 fw-6"><i
                                        class="fas fa-home me-1"></i>{{ __('messages.details.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('categoryPage',$postDetail->category->name)}}"
                                                       class="fs-14 fw-6">{!! $postDetail->category->name !!}</a></li>
                        <li class="breadcrumb-item active fs-14 fw-6"
                            aria-current="page">{!! $postDetail->title !!}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <input type="hidden" value="{{ $postDetail->slug }}" class="audioPostSlug">
        <!-- start news-details-section -->
        <section class="news-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- start news-details-left-section -->
                        <section class="news-details-left pe-xxl-3">
                            <div class="news-details">
                                <h3 class="text-black fw-7 fs-24 my-2">
                                    {!! $postDetail->title !!}
                                </h3>
                                <div class="post-content">
                                    <p class="text-gray">
                                        {!! $postDetail->description !!}
                                    </p>
                                </div>
                                <div class="row d-flex mb-3">
                                    <div class="col-sm-4">
                                        <div class="d-flex">
                                            <div class="">
                                                <a href="#!">
                                                    <img src="{{ $postDetail->user->profile_image }}" alt=""
                                                         class="h-40px me-2 image image-circle" width="40">
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <h5 class="fs-12 text-black mb-0">{{ $postDetail->user->full_name }}</h5>
                                                <span class="fs-12 text-gray">{{ ucfirst(__('messages.common.'.strtolower($postDetail->created_at->format('F')))) }} {{ $postDetail->created_at->format('d, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="news-text mb-2">
                                            <div class="desc d-inline-block">
                                                <i class="fa-solid fa-comments fs-12 text-gray me-1"></i>
                                                <span class="fs-14 text-gray me-1">{{ ( $comments->count() ? $comments->count() : 0 ) }}</span>
                                            </div>
                                            <div class="desc d-inline-block">
                                                <i class="fa-solid fa-clock fs-12 text-gray me-1"></i>
                                                <span class="fs-14 text-gray me-1"> {{ getReadingTime($postDetail->postAudios->audio_content) }}</span>
                                            </div>
                                            <div class="desc d-inline-block">
                                                <i class="fa-solid fa-eye fs-12 text-gray me-1"></i>
                                                <span class="fs-14 text-gray me-1"> {{ getPostViewCount($postDetail->id) }} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <section class="share-this-post-section">
                                            <div class="share-this-post">
                                                <div class="post-blog d-flex flex-wrap">
                                                    <div class="post text-center p-2 text-white fb">
                                                            <a target="_blank"
                                                               href="https://www.facebook.com/sharer.php?u={{ getUrl() }}">
                                                                <i class="social-icon fab fa-facebook-f fs-5"></i>
                                                            </a>
                                                    </div>
                                                    <div class="post text-center p-2 text-white tw">
                                                        <a target="_blank"
                                                           href="https://www.twitter.com/share?url={{ getUrl() }}">
                                                            <i class="social-icon fab fa-twitter fs-5"></i>
                                                        </a>
                                                    </div>
                                                    <div class="post text-center p-2 text-white ln">
                                                        <a target="_blank"
                                                           href="https://www.linkedin.com/shareArticle?mini=true&url={{ getUrl() }}">
                                                            <i class="social-icon fab fa-linkedin fs-5"></i>
                                                        </a>
                                                    </div>
                                                    <div class="post text-center p-2 text-white rd">
                                                        <a target="_blank"
                                                           href="https://reddit.com/submit?url={{ getUrl() }}">
                                                            <i class="social-icon fab fa-reddit fs-5"></i>
                                                        </a>
                                                    </div>
                                                    <div class="post text-center p-2 text-white wh">
                                                        <a target="_blank" href="https://wa.me/?text={{ getUrl() }}">
                                                            <i class="social-icon fab fa-whatsapp fs-5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="example-container">
                                        <div class="left">
                                            <div id="white-player">
                                                <div class="white-player-top">
                                                    <div>
                                                        &nbsp;
                                                    </div>
                                                    <div class="center">
                                                        <span class="now-playing">Now Playing</span>
                                                    </div>
                                                    <div>
                                                        <img src="https://521dimensions.com/img/open-source/amplitudejs/examples/dynamic-songs/show-playlist.svg"
                                                             class="show-playlist"/>
                                                    </div>
                                                </div>
                                                <div id="white-player-center">
                                                    <img data-amplitude-song-info="cover_art_url"
                                                         class="main-album-art"/>
                                                    <div class="song-meta-data">
                                                        <span data-amplitude-song-info="name" class="song-name"></span>
                                                        <span data-amplitude-song-info="artist"
                                                              class="song-artist"></span>
                                                    </div>
                                                    <div class="time-progress">
                                                        <div id="progress-container">
                                                            <input type="range" class="amplitude-song-slider"/>
                                                            <progress id="song-played-progress"
                                                                      class="amplitude-song-played-progress"></progress>
                                                            <progress id="song-buffered-progress"
                                                                      class="amplitude-buffered-progress"
                                                                      value="0"></progress>
                                                        </div>
                                                        <div class="time-container">
                                                            <span class="current-time">
                                                              <span class="amplitude-current-minutes"></span>:<span
                                                                        class="amplitude-current-seconds"></span>
                                                            </span>
                                                            <span class="duration">
                                                                <span class="amplitude-duration-minutes"></span>:<span
                                                                        class="amplitude-duration-seconds"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="white-player-controls">
                                                    <div class="amplitude-shuffle amplitude-shuffle-off"
                                                         id="shuffle"></div>
                                                    <div class="amplitude-prev" id="previous"></div>
                                                    <div class="amplitude-play-pause" id="play-pause"></div>
                                                    <div class="amplitude-next" id="next"></div>
                                                    <div class="amplitude-repeat" id="repeat"></div>
                                                </div>
                                                <div id="white-player-playlist-container">
                                                    <div class="white-player-playlist-top">
                                                        <div>
                                                            &nbsp;
                                                        </div>
                                                        <div>
                                                            <span class="queue">Queue</span>
                                                        </div>
                                                        <div>
                                                            <img src="https://521dimensions.com/img/open-source/amplitudejs/examples/dynamic-songs/close.svg"
                                                                 class="close-playlist"/>
                                                        </div>
                                                    </div>
                                                    <div class="white-player-up-next">
                                                        Up Next
                                                    </div>
                                                    <div class="white-player-playlist">
                                                        @foreach($postDetail->postAudios->media as $key => $audio)
                                                            <div class="white-player-playlist-song amplitude-song-container amplitude-play-pause"
                                                                 data-amplitude-song-index="{{ $key }}">
                                                                <div class="playlist-song-meta">
                                                                    <span class="playlist-song-name">{{ $audio['name'] }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="white-player-playlist-controls">
                                                        <img data-amplitude-song-info="cover_art_url"
                                                             class="playlist-album-art"/>
                                                        <div class="playlist-controls">
                                                            <div class="playlist-meta-data">
                                                                <span data-amplitude-song-info="name"
                                                                      class="song-name"></span>
                                                                <span data-amplitude-song-info="artist"
                                                                      class="song-artist"></span>
                                                            </div>
                                                            <div class="playlist-control-wrapper">
                                                                <div class="amplitude-prev"
                                                                     id="playlist-previous"></div>
                                                                <div class="amplitude-play-pause"
                                                                     id="playlist-play-pause"></div>
                                                                <div class="amplitude-next" id="playlist-next"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="news-desc mb-20">
                                    <p>
                                        @if(isset($postDetail->postAudios->audio_content))
                                            {!!  $postDetail->postAudios->audio_content !!}
                                        @endif
                                    </p>
                                </div>
                                @if(($postDetail->additional_image))
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <h4 class="">{{ __('messages.common.images') }}</h4>
                                            </div>
                                            <div class="row">
                                                <div class="swiper addition-image-swiper">
                                                    <div class="swiper-wrapper">
                                                        @foreach($postDetail->additional_image as $image)
                                                            <div class="swiper-slide mx-2">
                                                                <img src="{{$image}}" alt="" class="w-100" height="400">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                    <div class="swiper-pagination"></div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($postDetail->post_file) && count($postDetail->post_file) )
                                    <div class="mt-4 mb-4">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <h4 class="">{{ __('messages.common.files') }}</h4>
                                                @foreach($postDetail->post_file as $file)
                                                    <div class="file">
                                                        <a href="{{($file)}}"
                                                           class="tag-link">{{basename($file)}}</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @include('front_new.detail_pages.post-reaction')
                            <!-- start share-this-post-section -->
                            <section class="share-this-post-section mt-2 pt-md-3">
                                <div class="row admin-desc d-flex flex-wrap justify-content-between mb-20">
                                    @if(!empty(($postDetail->tags)))
                                        <div class="col-sm-12">
                                            <h5 class="fs-16 fw-6 text-black mb-3 pb-1 mx-2 float-start"> {{ __('messages.common.tags') }} </h5>
                                            <div class="tag-blogs d-flex overflow-auto">
                                                @foreach(explode(',',$postDetail->tags) as $tags)
                                                    <div class="tag br-gray-100 d-inline-block py-2 px-3 mb-3 me-2">
                                                        <a href="{{ route('popularTagPage',$tags) }}"
                                                           class="fs-14 text-black ">{!! $tags !!}</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="admin-post position-relative pt-60">
                                    @if(!empty($previousPost))
                                        <a href="{{ route('detailPage',$previousPost->slug) }}"
                                           class='prev-btn fs-16 text-black fw-6'>
                                            <i class="fa-solid fa-angle-left fs-14 me-1"></i>{{ __('messages.details.previous_post') }}
                                        </a>
                                    @endif
                                    @if(!empty($nextPost))
                                        <a href="{{ route('detailPage',$nextPost->slug) }}"
                                           class='next-btn fs-16 text-black fw-6'>{{ __('messages.details.next_post') }}
                                            <i class="fa-solid fa-angle-right fs-14 ms-1"></i>
                                        </a>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if(!empty($previousPost))
                                                <div class="card d-flex flex-row mb-40">
                                                    <div class="col-4 card-img-top">
                                                        <a href="{{ route('detailPage',$previousPost->slug) }}">
                                                            @if($previousPost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                <button class="common-music-icon sidebar-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-music text-white"></i>
                                                                </button>
                                                                <img src="{{ $previousPost->post_image }}" alt=""
                                                                     height="100" width="100">
                                                            @elseif($previousPost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                @php
                                                                    $thumbUrl = !empty($previousPost->postVideo) && !empty($previousPost->postVideo->thumbnail_image_url) ? $previousPost->postVideo->thumbnail_image_url : null;
                                                                    $thumbImage = !empty($previousPost->postVideo) && !empty($previousPost->postVideo->uploaded_thumb) ? $previousPost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                @endphp
                                                                <button class="common-music-icon sidebar-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-play text-white"></i>
                                                                </button>
                                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage) }}" alt=""
                                                                     height="100" width="100">
                                                            @else
                                                                <img src="{{ $previousPost->post_image }}" alt=""
                                                                     height="100" width="100">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="col-8 card-body ms-4">
                                                        <h5 class="card-title fs-14 fw-6 text-black">
                                                            <a href="{{ route('detailPage',$previousPost->slug) }}"
                                                               class="fs-14 fw-6 text-black position-relative">
                                                                {!! \Illuminate\Support\Str::limit($previousPost['title'],40,'...') !!}
                                                            </a>
                                                        </h5>
                                                        <span class="fs-14 text-gray"> {{ ucfirst(__('messages.common.'.strtolower($previousPost['created_at']->format('M')))) }} {{ $previousPost['created_at']->format('d, Y') }}</span>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            @if(!empty($nextPost))
                                                <div class="card d-flex flex-row mb-40">
                                                    <div class="col-4 card-img-top ">
                                                        <a href="{{ route('detailPage',$nextPost->slug) }}">
                                                            @if($nextPost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                <button class="common-music-icon sidebar-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-music text-white "></i>
                                                                </button>
                                                                <img src="{{ $nextPost->post_image }}"
                                                                     height="100" width="100" alt="">
                                                            @elseif($nextPost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                @php
                                                                    $thumbUrl = !empty($nextPost->postVideo) && !empty($nextPost->postVideo->thumbnail_image_url) ? $nextPost->postVideo->thumbnail_image_url : null;
                                                                    $thumbImage = !empty($nextPost->postVideo) && !empty($nextPost->postVideo->uploaded_thumb) ? $nextPost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                                @endphp
                                                                <button class="common-music-icon sidebar-music-icon"
                                                                        type="button">
                                                                    <i class="icon fa-solid fa-play text-white"></i>
                                                                </button>
                                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage) }}"
                                                                     height="100" width="100" alt="">
                                                            @else
                                                                <img src="{{ $nextPost->post_image }}"
                                                                     height="100" width="100" alt="">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="col-8 ms-4 ">
                                                        <h5 class="card-title fs-14 fw-6 text-black">
                                                            <a href="{{ route('detailPage',$nextPost->slug) }}"
                                                               class="fs-14 fw-6 text-black position-relative">
                                                                {!! \Illuminate\Support\Str::limit($nextPost['title'],40,'...') !!}
                                                            </a>
                                                        </h5>
                                                        <span class=" fs-14 text-gray">{{ ucfirst(__('messages.common.'.strtolower($nextPost['created_at']->format('M')))) }} {{ $nextPost['created_at']->format('d, Y') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end share-this-post-section -->
                            @if(checkAdSpaced('post_details'))
                                @if(isset(getAdImageDesktop(\App\Models\AdSpaces::POST_DETAILS)->code))
                                    <div class="index-top-desktop ad-space-url-desktop">
                                        {!! getAdImageDesktop(\App\Models\AdSpaces::POST_DETAILS)->code !!}
                                    </div>
                                @else

                                    <div class="container index-top-desktop">
                                        <a href="{{getAdImageDesktop(\App\Models\AdSpaces::POST_DETAILS)->ad_url}}"
                                           target="_blank">
                                            <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::POST_DETAILS)->ad_banner)}}"
                                                 width="800" class="img-fluid">
                                        </a>
                                    </div>
                                @endif
                                @if(isset(getAdImageDesktop(\App\Models\AdSpaces::POST_DETAILS)->code))
                                    <div class="index-top-mobile ad-space-url-mobile">
                                        {!! getAdImageDesktop(\App\Models\AdSpaces::POST_DETAILS)->code !!}
                                    </div>
                                @else
                                    <div class=" container index-top-mobile">
                                        <a href="{{getAdImageMobile(\App\Models\AdSpaces::POST_DETAILS)->ad_url}}"
                                           target="_blank">
                                            <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::POST_DETAILS)->ad_banner)}}"
                                                 width="350" class="img-fluid">
                                        </a>
                                    </div>
                                @endif
                            @endif
                            <!--start related-post-section -->
                            @if($relatedPosts->count() > 0)
                                <section class="related-post-section pt-40 mb-xl-5 mb-lg-4">
                                    <div class="section-heading border-0 mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 section-heading-left">
                                                <h2 class="text-black mb-0"> {{ __('messages.details.related_post') }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="related-post pt-60">
                                        <div class="row">
                                            @foreach($relatedPosts as $relatedPost)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                                                    <div class="card position-relative slide-item">
                                                        <div class="card-img-top">
                                                            <a href="{{ route('detailPage',$relatedPost->slug) }}">
                                                                @if($relatedPost['post_types'] == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                                    <button class="common-music-icon sidebar-music-icon"
                                                                            type="button">
                                                                        <i class="icon fa-solid fa-music text-white"></i>
                                                                    </button>
                                                                    <img src="{{ $relatedPost['post_image'] }}" alt=""
                                                                         class="w-100 h-100">
                                                                @elseif($relatedPost['post_types'] == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                                    <button class="common-music-icon sidebar-music-icon"
                                                                            type="button">
                                                                        <i class="icon fa-solid fa-play text-white"></i>
                                                                    </button>
                                                                    <img src="{{ $relatedPost['post_image'] }}" alt=""
                                                                         class="w-100 h-100">
                                                                @else
                                                                    <img src="{{ $relatedPost['post_image'] }}" alt=""
                                                                         class="w-100 h-100">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <a href="#"
                                                               class="tags position-absolute  fw-7">{{ $relatedPost['category']['name'] }}</a>
                                                            <h5 class="card-title mb-1 fs-16 text-black fw-6">
                                                                <a class="text-black"
                                                                   href="{{ route('detailPage',$relatedPost->slug) }}">
                                                                    {!!  $relatedPost['title'] !!}
                                                                </a>
                                                            </h5>
                                                            <span class="card-text fs-12 text-gray">{{ ucfirst(__('messages.common.'.strtolower($relatedPost['created_at']->format('M')))) }} {{ $relatedPost['created_at']->format('d, Y') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($loop->iteration >= 6)
                                                    @break
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            @endif
                            <!--end related-post-section -->

                            <!-- start post-comment-section -->
                            <section class="post-comment-section bg-light px-30 py-4">
                                <h5 class="fs-16 text-black fw-6 mb-3">{{ __('messages.comment.post_a_comment') }}</h5>
                                <form id="commentForm">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $postDetail->id }}">
                                    <input type="hidden" name="user_id"
                                           value="{{ isset(getLogInUser()->id) ? getLogInUser()->id : null }}">
                                    <div class="row">
                                        @if(!Auth::check())
                                            <div class="col-md-6">
                                                <input type="text" class="form-control fs-14 text-gray" name="name"
                                                       id="name"
                                                       placeholder="{{ __('messages.comment.enter_your_name') }}"
                                                       required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" name="email" id="email"
                                                       class="form-control fs-14 text-gray"
                                                       placeholder="{{ __('messages.comment.enter_your_email') }}"
                                                       required>
                                            </div>
                                        @endif
                                        <div class="col-12">
                                            <textarea class="form-control fs-14 text-gray" name="comment" id="comment"
                                                      rows="3"
                                                      placeholder="{{ __('messages.comment.type_your_comments') }}"
                                                      required></textarea>
                                        </div>
                                        <div class="col-12 mb-2">
                                            @if($showCaptcha == "1")
                                                <input type="hidden" value="{{ $settings['show_captcha'] }}"
                                                       id="googleCaptch">
                                                <div class="form-group mb-1">
                                                    <div class="g-recaptcha" id="gRecaptchaContainerPostDetails"
                                                         data-sitekey="{{ $settings['site_key'] }}"></div>
                                                    <div id="g-recaptcha-error"></div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary ">{{ __('messages.common.submit') }}</button>
                                </form>
                            </section>
                            <!-- end post-comment-section -->

                            <!--start comment-section -->
                            <section class="comment-section mt-4 pt-3 blog-post-comment-view">
                                <h3 class=" text-black fw-6 mb-3 comment-data @if(empty($totalComments)) d-none @endif">
                                    {{ __('messages.comments') }}
                                    <span class="ms-2 count-data">
                                         {{  $totalComments }}
                                    </span>
                                </h3>
                                @php
                                    $inStyle = 'style=';
                                    $style   = '"overflow-y: auto; max-height: 325px"';
                                @endphp
                                <div class="comment-view" {!! $totalComments >= 3 ? $inStyle.$style : '' !!}>
                                    @foreach($comments as $comment)
                                        <div class="media d-flex card-view-{{$comment->id}} mt-2">
                                            <div class="media-img me-4 rounded-10">
                                                <img src="{{ isset($comment->users->profile_image) ?                                                                               $comment->users->profile_image : asset('web/media/avatars/150-2.jpg') }}"
                                                     alt="" class="w-100 h-100 rounded-10">
                                            </div>
                                            <div class="media-body comment-content w-100">
                                                <div class="media-title d-flex flex-wrap justify-content-between">
                                                    <h5 class="mt-0 text-black fs-16 mb-1 user-name">{{ $comment->name                                                             }}</h5>
                                                    @if(Auth::check() && $comment->user_id == getLogInUser()->id)
                                                        <button class="delete-btn fs-14 text-danger delete-comment-btn"
                                                                data-id="{{$comment['id']}}"><i
                                                                    class="fa fa-trash-can"></i> {{ __('messages.delete') }}
                                                        </button>
                                                    @endif
                                                </div>
                                                <span class="text-gray fs-14 reply-time">{{                                                                                       $comment->created_at->diffForHumans() }}</span>
                                                <p class="fs-14 text-gray mt-1 comment-msg">
                                                    {!! $comment->comment !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                            <!--end comment-section -->

                        </section>
                        <!-- end news-details-left-section -->

                    </div>
                    <div class="col-xl-4 ">
                        @include('front_new.detail_pages.side-menu')
                    </div>
                </div>
            </div>
        </section>
        <!-- end news-details-section -->
        @include('front_new.detail_pages.template.template')
    </div>
@endsection
@section('script')
    {{--    {!! reCaptcha()->renderJs() !!}--}}
    <script>
        let userProfile = '{{ asset('images/avatar.png') }}'
    </script>

@endsection
