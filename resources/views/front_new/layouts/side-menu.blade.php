<!-- start trending-post-section -->
@if(!empty($getTrendingPosts))
<section class="trending-post-section pt-100">
    <div class="section-heading border-0 mb-2">
        <div class="row align-items-center">
            <div class="col-12 section-heading-left">
                <h2 class="text-black mb-0">{{ __('messages.details.trending_post') }}</h2>
            </div>
        </div>
    </div>
    <div class="trending-post">
        <div class="row">
            <div class="col-lg-12 d-flex flex-wrap justify-content-between">
                @foreach($getTrendingPosts as $trendingPost)
                    @if(!empty($trendingPost))
                        <div class="col-lg-12 col-sm-6 card d-flex flex-xl-row py-2 pe-lg-0 pe-md-4 pe-sm-3">
                            <div class="row">
                                <div class="col-xl-4 col-5 card-top">
                                    <div class="card-img-top">
                                        <a href="{{route('detailPage',$trendingPost['slug'])}}">
{{--                                            <img data-src="{{ $trendingPost['post_image'] }}" src="{{ asset('front_web/images/bg-process.png') }}" alt="" class="w-100 h-100 w-300px lazy">--}}
                                            @if($trendingPost['post_types'] == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                <button class="common-music-icon sidebar-music-icon"
                                                        type="button">
                                                    <i class="icon fa-solid fa-music text-white"></i>
                                                </button>
                                                <img src="{{ $trendingPost['post_image'] }}" alt=""
                                                     class="w-100 h-100 w-300px">
                                            @elseif($trendingPost['post_types'] == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                @php
                                                    $thumbUrl = !empty($trendingPost['post_video']) && !empty($trendingPost['post_video']['thumbnail_image_url']) ? $trendingPost['post_video']['thumbnail_image_url'] : null;
                                                    $thumbImage = !empty($trendingPost['post_video']) && !empty($trendingPost['post_video']['uploaded_thumb']) ? $trendingPost['post_video']['uploaded_thumb'] : asset('front_web/images/default.jpg')
                                                @endphp
                                                <button class="common-music-icon sidebar-music-icon"
                                                        type="button">
                                                    <i class="icon fa-solid fa-play text-white "></i>
                                                </button>
                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" alt=""
                                                     class="w-100 h-100 w-300px">
                                            @else
                                                <img src="{{ $trendingPost['post_image'] }}" alt=""
                                                     class="w-100 h-100 w-300px">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-7">
                                    <div class="card-body ">
                                        <h5 class="card-title mb-1 fs-12 text-gray fw-7">
                                            {!! $trendingPost['category']['name'] !!}
                                        </h5>
                                        <p class="card-title mb-0 fs-14 text-black fw-6">
                                            <a href="{{route('detailPage',$trendingPost['slug'])}}" class="text-black">
                                                {!! $trendingPost['title'] !!}
                                            </a>
                                        </p>
                                        <span class="card-text fs-12 text-gray">{{\Carbon\Carbon::parse($trendingPost['created_at'])->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                        @if($loop->iteration >= 6)
                            @break
                        @endif
                @endforeach
                    @if(checkAdSpaced('trending_post_index_page'))
                        @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_TRENDING_POST)->code))
                            <div class="container index-top-desktop ad-space-url-desktop">
                                {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_TRENDING_POST)->code !!}
                            </div>
                        @else
                            <div class="index-top-desktop mt-3">
                                <a href="{{getAdImageDesktop(\App\Models\AdSpaces::INDEX_TRENDING_POST)->ad_url}}"
                                   target="_blank">
                                    <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_TRENDING_POST)->ad_banner)}}"
                                         width="800" class="img-fluid">
                                </a>
                            </div>
                        @endif
                            @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_TRENDING_POST)->code))
                                <div class="container index-top-mobile ad-space-url-mobile">
                                    {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_TRENDING_POST)->code !!}
                                </div>
                            @else
                        <div class="index-top-mobile mt-3">
                            <a href="{{getAdImageMobile(\App\Models\AdSpaces::INDEX_TRENDING_POST)->ad_url}}"
                               target="_blank">
                                <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::INDEX_TRENDING_POST)->ad_banner)}}"
                                     width="350" class="img-fluid">
                            </a>
                        </div>
                            @endif
                    @endif
            </div>
        </div>
    </div>
</section>
@endif
<!-- end trending-post-section -->

<!-- start hot-categories-section -->
@if(!empty($getPopulerCategories))
    <section class="hot-categories-section py-60 pb-4">
        <div class="section-heading border-0 mb-30">
            <div class="row align-items-center">
                <div class="col-12 section-heading-left">
                    <h2 class="text-black mb-0">{{ __('messages.details.hot_categories') }}</h2>
                </div>
            </div>
        </div>
        <div class="hot-categories-post">
            @foreach(array_slice($getPopulerCategories,0,10) as $category)
                <div class="post bg-light d-flex justify-content-between align-items-center px-4 pt-2 pb-2 mb-20 ">
                    <div class="desc d-flex align-items-center">
                        <i class="fa-solid fa-list me-4 text-primary"></i>
                        <a href="{{ route('categoryPage',['category' => $category['slug']]) }}" class="fs-16 fw-6 text-black mb-0">{!! $category['name'] !!}</a>
                    </div>
                    <div class="numbers bg-white d-flex align-items-center justify-content-center rounded-circle">
                        <a href="#" class="fs-16 fw-6 text-gray">{{ $category['posts_count'] }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
<!-- end hot-categories-section -->

<!-- start popular-news-section -->
@if(!empty(array_filter($getPopularNews)))
    <section class="popular-news-section">
        <div class="section-heading border-0 mb-2">
            <div class="row align-items-center">
                <div class="col-12 section-heading-left">
                    <h2 class="text-black mb-0">{{ __('messages.details.popular_news') }}</h2>
                </div>
            </div>
        </div>
        <div class="popular-news-post">
            <div class="row">
                <div class="col-lg-12 d-flex flex-wrap justify-content-between">
                    @foreach($getPopularNews as $news)
                        @if(!empty($news))
                            <div class="col-lg-12 col-sm-6 card d-flex flex-xl-row py-2 pe-lg-0 pe-md-4 pe-sm-3">
                                <div class="row">
                                    <div class="col-xl-4 col-5 card-top">
                                        <div class="card-img-top">
                                            <a href="{{route('detailPage',$news['slug'])}}">
{{--                                                <img data-src="{{ $news['post_image'] }}" src="{{ asset('front_web/images/bg-process.png') }}"  alt="" class="w-100 h-100 w-300px lazy">--}}
                                                @if($news['post_types'] == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                    <button class="common-music-icon sidebar-music-icon"
                                                            type="button">
                                                        <i class="icon fa-solid fa-music text-white"></i>
                                                    </button>
                                                    <img src="{{ $news['post_image'] }}" alt=""
                                                         class="w-100 h-100 w-300px">
                                                @elseif($news['post_types'] == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                    @php
                                                        $thumbUrl = !empty($news['post_video']) && !empty($news['post_video']['thumbnail_image_url']) ? $news['post_video']['thumbnail_image_url'] : null;
                                                        $thumbImage = !empty($news['post_video']) && !empty($news['post_video']['uploaded_thumb']) ? $news['post_video']['uploaded_thumb'] : asset('front_web/images/default.jpg')
                                                    @endphp
                                                    <button class="common-music-icon sidebar-music-icon"
                                                            type="button">
                                                        <i class="icon fa-solid fa-play text-white"></i>
                                                    </button>
                                                    <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" alt=""
                                                         class="w-100 h-100 w-300px">
                                                @else
                                                    <img src="{{ $news['post_image'] }}" alt=""
                                                         class="w-100 h-100 w-300px">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-7">
                                        <div class="card-body">
                                            <h5 class="card-title mb-1 fs-12 text-gray fw-7">{!! $news['category']['name'] !!}
                                            </h5>
                                            <p class="card-title mb-0 fs-14 text-black fw-6">
                                                <a href="{{route('detailPage',$news['slug'])}}" class="text-black">
                                                    {!! $news['title'] !!}
                                                </a>
                                            </p>
                                            <span class="card-text fs-12 text-gray">{{ \Carbon\Carbon::parse($news['created_at'])->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                            @if($loop->iteration >= 6)
                                @break
                            @endif
                        
                    @endforeach
                        @if(checkAdSpaced('popular_news_index_page'))
                            @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->code))
                                <div class="container index-top-desktop ad-space-url-desktop">
                                    {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->code !!}
                                </div>
                            @else
                            <div class="index-top-desktop mt-3">
                                <a href="{{getAdImageDesktop(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->ad_url}}"
                                   target="_blank">
                                    <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->ad_banner)}}"
                                         width="800" class="img-fluid">
                                </a>
                            </div>
                            @endif
                                @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->code))
                                    <div class="container index-top-mobile ad-space-url-mobile">
                                        {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->code !!}
                                    </div>
                                @else
                            <div class="index-top-mobile mt-3">
                                <a href="{{getAdImageMobile(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->ad_url}}"
                                   target="_blank">
                                    <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::INDEX_POPULAR_NEWS)->ad_banner)}}"
                                         width="350" class="img-fluid">
                                </a>
                            </div>
                                @endif
                        @endif
                       
                </div>
            </div>
        </div>
    </section>
@endif
<!-- end popular-news-section -->
<!-- end popular-news-section -->
@if($getRecommendedPost->count() > 0)
    <section class="popular-news-section pt-5">
        <div class="section-heading border-0 mb-2">
            <div class="row align-items-center">
                <div class="col-12 section-heading-left">
                    <h2 class="text-black mb-0 w-200px custom-label-laptop">{{ __('messages.details.recommended_post') }}</h2>
                </div>
            </div>
        </div>
        <div class="popular-news-post">
            <div class="row">
                <div class="col-lg-12 d-flex flex-wrap justify-content-between">
                    @foreach($getRecommendedPost as $recommendedPost)
                        <div class="col-lg-12 col-sm-6 card d-flex flex-xl-row py-2 pe-lg-0 pe-md-4 pe-sm-3">
                            <div class="row">
                                <div class="col-xl-4 col-5 card-top">
                                    <div class="card-img-top">
                                        <a href="{{route('detailPage',$recommendedPost->slug)}}">
{{--                                            <img data-src="{{ $recommendedPost['post_image'] }}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 w-300px lazy">--}}
                                            @if($recommendedPost['post_types'] == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                <button class="common-music-icon sidebar-music-icon"
                                                        type="button">
                                                    <i class="icon fa-solid fa-music text-white"></i>
                                                </button>
                                                <img src="{{ $recommendedPost['post_image'] }}" alt=""
                                                     class="w-100 h-100 w-300px">
                                            @elseif($recommendedPost['post_types'] == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                @php
                                                    $thumbUrl = !empty($recommendedPost->postVideo) && !empty($recommendedPost->postVideo->thumbnail_image_url) ? $recommendedPost->postVideo->thumbnail_image_url : null;
                                                    $thumbImage = !empty($recommendedPost->postVideo) && !empty($recommendedPost->postVideo->uploaded_thumb) ? $recommendedPost->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                                                @endphp
                                                <button class="common-music-icon sidebar-music-icon"
                                                        type="button">
                                                    <i class="icon fa-solid fa-play text-white"></i>
                                                </button>
                                                <img src="{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage)  }}" alt=""
                                                     class="w-100 h-100 w-300px">
                                            @else
                                                <img src="{{ $recommendedPost['post_image'] }}" alt=""
                                                     class="w-100 h-100 w-300px">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-7">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1 fs-12 text-gray fw-7">{!! $recommendedPost['category']['name'] !!}
                                        </h5>
                                        <p class="card-title mb-0 fs-14 text-black fw-6">
                                            <a href="{{route('detailPage',$recommendedPost->slug)}}" class="text-black">
                                                {!! $recommendedPost['title'] !!}
                                            </a>
                                        </p>
                                        <span class="card-text fs-12 text-gray">{{ $recommendedPost['created_at']->format('F d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($loop->iteration >= 6)
                            @break
                        @endif
                        
                    @endforeach
                        @if(checkAdSpaced('recommended_post_index_page'))
                            @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->code))
                                <div class="index-top-desktop ad-space-url-desktop">
                                    {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->code !!}
                                </div>
                            @else
                            <div class="index-top-desktop mt-3">
                                <a href="{{getAdImageDesktop(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->ad_url}}"
                                   target="_blank">
                                    <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->ad_banner)}}"
                                         width="800" class="img-fluid">
                                </a>
                            </div>
                            @endif
                                @if(isset(getAdImageDesktop(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->code))
                                    <div class="index-top-mobile ad-space-url-mobile">
                                        {!! getAdImageDesktop(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->code !!}
                                    </div>
                                @else
                            <div class="index-top-mobile mt-3">
                                <a href="{{getAdImageMobile(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->ad_url}}"
                                   target="_blank">
                                    <img src="{{asset(getAdImageMobile(\App\Models\AdSpaces::INDEX_RECOMMENDED_POST)->ad_banner)}}"
                                         width="350" class="img-fluid">
                                </a>
                            </div>
                                @endif
                        @endif
                    
                </div>
            </div>
        </div>
    </section>
@endif
<!-- start popular-tag-section -->
<!-- start popular-tag-section -->
@if(count($getPopularTags))
<section class="popular-tag-section py-4">
    <div class="section-heading border-0 mb-30">
        <div class="row align-items-center">
            <div class="col-12 section-heading-left">
                <h2 class="text-black mb-0">{{ __('messages.details.popular_tags') }}</h2>
            </div>
        </div>
    </div>
    <div class="popular-tags">
        @foreach($getPopularTags as $tag)
            <div class="tag br-gray-100 d-inline-block py-2 px-3 mb-3 me-2">
                <a href="{{ route('popularTagPage',$tag) }}" class="fs-14 text-black ">{!!  $tag !!}</a>
            </div>
            @if($loop->iteration >= 15)
                @break
            @endif
        @endforeach
    </div>
</section>
@endif
<!-- end popular-tag-section -->

<!-- start voting-poll-section -->
@if(!empty($getPoll->count()))
    <section class="voting-poll-section">
        <div class="section-heading border-0 mb-30">
            <div class="row align-items-center">
                <div class="col-12 section-heading-left">
                    <h2 class="text-black mb-0">{{ __('messages.details.voting_poll') }}</h2>
                </div>
            </div>
        </div>
        @php $styleCss = 'style'; @endphp
        @foreach($getPoll as $poll)
            <div class="voting-poll">
                <p class="text-black fw-6 fs-16 mb-20">{!! $poll['question'] !!}</p>
                <form class="poll-vote-form" id="pollVoteForm">
                    @csrf
                    <input type="hidden" id="pollId" name="poll_id" value="{{$poll['id']}}">
                    <div class="mb-2" id="pollOption{{$poll->id}}">
                        @foreach($getOption as $option)
                            @if(!empty($poll->$option))
                                <div class="form-check ">
                                    <input class="form-check-input me-3 poll-answer" type="radio" name="answer"
                                           id="pollAnswer-{{ $option }}-{{$poll['id']}}" value="{{$poll[$option]}}">
                                    <label class="form-check-label fs-14"
                                           for="pollAnswer-{{ $option }}-{{$poll['id']}}">{!! $poll[$option] !!}</label>
                                </div>
                            @endif
                        @endforeach
                        <div class="vote d-flex justify-content-between align-items-center pt-2 mb-md-2 mb-1">
                            <button type="submit" class="btn btn-primary poll-submit-btn"
                                    data-id="{{$poll['id']}}">{{ __('messages.details.vote') }}</button>
                            <a href="javascript:void(0);" class="fs-14 text-gray fw-6 view-statistic"
                               data-id="{{$poll->id}}">{{ __('messages.details.view_results') }}</a>
                        </div>
                        <span id="voteError{{$poll->id}}"></span>
                    </div>
                </form>
                <div id="pollStatistic{{$poll->id}}" class="mb-2 d-none">
                    @php $vote = getPollStatistics($poll->id) @endphp
                    @foreach($vote['optionAns'] as $pollName => $statistic)
                        <p class="mt-0 mb-2 fs-14">{{$pollName}}</p>
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped" {{ $styleCss }}="width: {{$statistic}}%;"
                                role="progressbar" aria-valuenow="{{$statistic}}" aria-valuemin="0" aria-valuemax="100">
                                <span>{{$statistic}}%</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="vote d-flex justify-content-between align-items-center pt-2 mb-md-2 mb-1">
                        <span class="text-black fs-14 fw-6">{{ __('messages.poll.total_vote') }}:{{$vote['totalPollResults']}}</span>
                        <a href="javascript:void(0);" class="view-option fs-14 text-gray fw-6"
                           data-id="{{$poll->id}}">{{ __('messages.details.view_options') }} </a>
                    </div>
                    <span id="voteSuccess{{$poll->id}}"><p>  </p></span>
                </div>
            </div>
        @endforeach
    </section>
@endif  
<!-- end voting-poll-section -->
