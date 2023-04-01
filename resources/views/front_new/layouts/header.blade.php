<!-- start-breaking-news-section -->
<div class="breaking-news-section py-2" id="topbar-wrap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="title d-flex align-items-center justify-content-center">
                    <div class="icon bg-primary d-flex justify-content-center align-items-center me-1">
                        <i class="fas fa-bolt text-white"></i>
                    </div>
                    <div class="trending-title d-flex ">
                        <a href="#" class="text-white">{{ __('messages.details.breaking')  }}</a>
                    </div>
                    <span class="text-gray mx-2 h-100" aria-live="assertive" aria-atomic="true"> | </span>
                    <div class="content float-left breaking-slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach(getBreakingPost() as $breakingPost)
                                <div class="content item d-flex justify-content-start align-items-center swiper-slide">
                                    <i class="fa-solid fa-circle text-white me-2"></i>
                                    <a href="{{ route('detailPage', $breakingPost->slug) }}" class="fs-12 text-white" >
                                        {!! $breakingPost->title !!}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end-breaking-news-section -->

<!--start top-bar-section -->
<section class="top-bar-section py-lg-2 py-3 top-bar">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-1 col-sm-3 col-3 ">
                <a href="/" class="top-bar-logo d-block">
                    <img src="{{$settings['logo']}}" alt="" class="img-fluid w-100 h-100"/>
                </a>
            </div>
            <div class="col-xl-7 col-md-8 col-9 ">
                <div class="row align-items-center justify-content-end  ">
                    <div class="col-xxl-4 col-lg-4 col-sm-6  br-gray  text-end  pe-xl-4 pe-lg-4 ">
                        <span class="text-secondary fs-14 pe-sm-0">{{ \Carbon\Carbon::now()->isoFormat('ddd, MMM DD YYYY') }}</span>
                    </div>
                    <div class="col-xl-4 col-lg-4 br-gray py-1 d-lg-block d-none ">
                        <div class="social-icon d-flex justify-content-around ">
                            <a href="{{$settings['facebook_url']}}" target="_blank"> <i
                                        class="fa-brands fa-facebook text-secondary fs-18"></i></a>
                            {{-- <a href="{{$settings['twitter_url']}}" target="_blank"> <i class="fa-brands fa-twitter text-secondary fs-18"></i></a> --}}
                            <a href="{{$settings['linkedin_url']}}" target="_blank"> <i class="fa-brands fa-linkedin-in text-secondary fs-18"></i></a>
                            {{-- <a href="{{$settings['pinterest_url']}}" target="_blank"> <i class="fa-brands fa-pinterest text-secondary fs-18"></i></a> --}}
                            <a href="{{$settings['instagram_url']}}" target="_blank"> <i class="fa-brands fa-instagram text-secondary fs-18"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-6  d-flex flex-wrap justify-content-sm-between justify-content-end align-items-center">
                        @if(getLogInUser())
                            <div class="language-dropdown ms-2 d-none d-sm-block">
                                <a class="nav-link p-0 fs-14 pe-3" href="javascript:void(0)"
                                   id="dropdownMenuButton1">
                                    {{ getLogInUser()->last_name }}
                                    <i class="fa-solid fa-angle-down icon fs-12"></i>
                                </a>
                                <ul class="nav submenu language-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="nav-item languageSelection">
                                        @if(Auth::user()->hasRole('customer'))
                                            <a class="nav-link fs-14 d-flex align-items-center"
                                               data-turbo="false" href="{{ route('customer.dashboard') }}">
                                                {{ __('messages.details.admin_panel') }}
                                            </a>
                                        @endif
                                        @if(!Auth::user()->hasRole('customer'))
                                            <a class="nav-link fs-14 d-flex align-items-center"
                                               data-turbo="false" href="{{ route('admin.dashboard') }}">
                                                {{ __('messages.details.admin_panel') }}
                                            </a>
                                        @endif
                                    </li>
                                    <li class="nav-item languageSelection">
                                        <form id="logout-form" action="{{url('/logout')}}" method="post">
                                            @csrf
                                        </form>
                                        <a href="{{url('logout')}}" onclick="event.preventDefault();
                                        localStorage.clear();  document.getElementById('logout-form').submit();"
                                           class="nav-link fs-14 d-flex align-items-center"> {{ __('messages.details.logout') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="d-flex">
                                <a href="{{ route('login') }}"
                                   class="fs-14 text-primary fw-6  login-btn d-none d-sm-block"
                                   data-turbo="false">{{ __('messages.common.login') }}</a>
                                <samp class="text-secondary">/</samp>
                                <a href="{{ route('register') }}"
                                   class="fs-14 text-primary fw-6   login-btn d-none d-sm-block"
                                   data-turbo="false">{{ __('auth.register') }}</a>
                            </div>
                        @endif
                        <div class="language-dropdown pe-sm-0 pe-2">
                            <ul class="mb-0 ps-0">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 p-0 " href="javascript:void(0)"> {{ getFrontSelectLanguageName() }} <i class="fa-solid fa-angle-down icon fs-12"></i></a>
                                    <ul class="nav submenu language-menu">
                                        @foreach(getFrontLanguage() as $key => $language)
                                        <li class="nav-item languageSelection" data-prefix-value="ar">
                                            <a href="javascript:void(0)" class="nav-link fs-14 d-flex align-items-center selectLanguage
                                               @if(getFrontSelectLanguageName() == $language) active @endif"  data-id="{{ $key }}">
                                                {{ $language }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                            <button class="dropdown border-0 bg-transparent position-relative me-2 d-lg-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <a href="javascript:void(0)"><i class="fa-solid fa-magnifying-glass fs-15"></i></a>
                            </button>
                            <div class="dropdown-menu mobile-search" >
                                <form action="{{ route('allPosts') }}" class="form search-form-box search-input">
                                    <div class="form-group border-0 search-input">
                                        <input type="text" name="search" id="search" placeholder="Search..." class="form-control bg-light rt-search-control custom-input-control search-input mb-0" value="">
                                        <button type="submit" class="search-submit custom-submit search-input">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        <div class="offcanvas-toggle d-lg-none d-block">
                            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasToggle"
                               aria-controls="offcanvasToggle">
                                <i class="fa-solid fa-bars "></i>
                            </a>
                            <div class="offcanvas-wrapper offcanvas-wrapper-start" tabindex="-1"
                                 id="offcanvasToggle" aria-labelledby="offcanvasToggleLabel">
                                <div class="offcanvas-content m-0">
                                    <div class="text-end">
                                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasToggle"
                                           aria-controls="offcanvasToggle">
                                            <i class="fa fa-close text-black fs-5 m-2 me-3"></i>
                                        </a>
                                    </div>
                                    <div class="set">
                                        <a href="/" class="fs-14 fw-6 {{ (Request::is('/')) ? 'active' : '' }}">
                                            {{ __('messages.home') }}
                                        </a>
                                    </div>
                                    @php
                                        $nav = getHeaderElement();
                                    @endphp
                                    @foreach($nav['navigations'] as $key => $navigation)
                                        @if($navigation['navigationable']['lang_id'] == getFrontSelectLanguage() ||                                                                         $navigation->navigationable_type == \App\Models\Menu::class )
                                            @php
                                                  $isSubNav = count($nav['navigationsTakeData'][$navigation->id]) > 0;
                                                  $subNavLangs = $nav['navigationsTakeData'][$navigation->id] ;
                                                  $menuName = $navigation->navigationable->name ? $navigation->navigationable->name :                                                                      $navigation->navigationable->title;
                                                  $langId = false;
                                                      foreach($subNavLangs as $subNavLang) {
                                                          if($langId){
                                                              continue;
                                                          }
                                                          if($subNavLang['navigationable_type'] == \App\Models\SubCategory::class) {
                                                              $langId = $subNavLang->navigationable()
                                                              ->where('lang_id',getFrontSelectLanguage())->exists();
                                                          }
                                                      }
                                            @endphp
                                            <div class="set">
                                                <a href="{{ route('categoryPage',['category'=>$navigation->navigationable->slug]) }}" class="fs-14 fw-6">
                                                    {!! ($navigation->navigationable->name) ? $navigation->navigationable->name :                                                                      $navigation->navigationable->title !!}
                                                </a>
                                                @if(($langId ||  $navigation->navigationable_type== \App\Models\Menu::class )&& $isSubNav)
                                                <a href="#" class="p-0" data-turbo="false"><i class="fa fa-plus"></i></a>
                                                @endif
                                                @if( $langId || $navigation->navigationable_type ==
                                                \App\Models\Menu::class)
                                                    @if($isSubNav)
                                                        <div class="content">
                                                            @foreach($nav['navigationsTakeData'] as $key => $navSub)
                                                                @if($key == $navigation->id)
                                                                    @foreach($navSub as $sub)
                                                                        <li><a class="fs-14 fw-6" @if(($sub->navigationable->link) !== Null)
                                                                            href="{{getNavUrl($sub->navigationable->link)}}"
                                                                               @else
                                                                               href="{{route('categoryPage',                                                                                                                ['category'=>$navigation->navigationable->slug,                                                                                               'slug'=>$sub->navigationable->slug])}}"
                                                                                    @endif>
                                                                                {!! ($sub->navigationable->name) ? $sub->navigationable->name :                                                                                $sub->navigationable->title !!}</a>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach

                                    {{-- <li class="">
                                        <a class="fs-14 fw-6 d-flex justify-content-between {{ 'Semanário' == ucfirst(last(request()->segments())) ? 'active': '' }}" href="{{route('front.semanarioPdf')}}">{{ __('Semanário') }}</a>
                                    </li> --}}
                                    {{-- <div class="set">
                                        <a href="{{route('front.semanarioPdf')}}" class="fs-14 fw-6 {{ ((Request::is('semario-pdf')) || (Request::is('semario-pdf'))) ? 'active' : '' }}">
                                            {{ __('messages.details.gallery') }}
                                        </a>
                                    </div> --}}
                                    <div class="set">
                                        <a href="{{route('contact.index')}}" class="fs-14 fw-6 {{ 'Contact' == ucfirst(last(request()->segments())) ? 'active': '' }}">
                                            {{ __('messages.details.contact_us') }}
                                        </a>
                                    </div>
                                    <div class="set">
                                        @if($nav['pages']->count() > 0)
                                        <a href="javascript:void(0)" class="fs-14 fw-6 {{ 'Pages' == ucfirst(last(request()->segments())) ? 'active': '' }}">
                                            {{ __('messages.pages') }}
                                        </a>
                                            <a href="#" class="p-0" data-turbo="false><i class="fa fa-plus"></i></a>
                                        @endif
                                        <div class="content">
                                            @foreach($nav['pages'] as $page)
                                                <li>
                                                    <a href="{{route('pages.show-page-slug', $page->slug)}}" class="fs-14 fw-6">
                                                        {!! $page->name !!}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if(getLogInUser())
                                        <div class="set">
                                            <a href="javascript:void(0)" class="fs-14 fw-6">
                                                {{ getLogInUser()->last_name }}
                                            </a>
                                            <a href="#" class="p-0" data-turbo="false><i class="fa fa-plus"></i></a>
                                            <div class="content">
                                                <li>
                                                    <a href="{{ route('admin.dashboard') }}" class="fs-14 fw-6" data-turbo="false">
                                                        {{ __('messages.details.admin_panel') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <form id="logout-form" action="{{url('/logout')}}" method="post">
                                                        @csrf
                                                    </form>
                                                    <a href="{{url('logout')}}" class="fs-14 fw-6" onclick="event.preventDefault();
                                        localStorage.clear();  document.getElementById('logout-form').submit();">
                                                        {{ __('messages.details.logout') }}
                                                    </a>
                                                </li>
                                            </div>
                                        </div>
                                    @else
                                        <div class="set">
                                            <a href="{{ route('login') }}" class="fs-14 fw-6 {{ 'Contact' == ucfirst(last(request()->segments())) ? 'active': '' }}" data-turbo="false">
                                                {{ __('messages.common.login') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(checkAdSpaced('header'))
    @if(isset(getAdImageDesktop(\App\Models\AdSpaces::HEADER)->code))
        <div class=" container index-top-desktop ad-space-url-desktop-header">
            {!! getAdImageDesktop(\App\Models\AdSpaces::HEADER)->code !!}
        </div>
    @else
    <div class="container index-top-desktop">
        <a href="{{getAdImageDesktop(\App\Models\AdSpaces::HEADER)->ad_url}}"
           target="_blank">
            <img src="{{asset(getAdImageDesktop(\App\Models\AdSpaces::HEADER)->ad_banner)}}"
                 width="1000" class="img-fluid" style="margin-left: 125px;">
        </a>
    </div>
    @endif
@endif
{{--<div class="container py-2 heder-ad">--}}
{{--    <img src="{{asset('images/1300.png')}}" width="1300" height="130" class="img-fluid">--}}
{{--</div>--}}
<!--end top-bar-section -->

<!-- start header section -->
<header class="bg-light d-lg-block d-none header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-11 col-12">
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link fs-14 fw-6 {{ (Request::is('/')) ? 'active' : '' }}" aria-current="page"  href="/">
                                {{ __('messages.home') }}</a>
                        </li>
                        @php
                            $nav = getNavigationDetails();
                        @endphp
                        @if($nav['navigationsCount'] >= 0)
                            @foreach($nav['navigations'] as $key => $navigation)
                                @if($navigation['navigationable']['lang_id'] == getFrontSelectLanguage() ||                                                                         $navigation->navigationable_type == \App\Models\Menu::class )
                                    @php
                                        $isSubNav = count($nav['navigationsTakeData'][$navigation->id]) > 0;
                                        $subNavLangs = $nav['navigationsTakeData'][$navigation->id] ;
                                        $menuName = $navigation->navigationable->name ? $navigation->navigationable->name :                                                                      $navigation->navigationable->title;
                                        $langId = false;
                                        foreach($subNavLangs as $subNavLang) {
                                            if($langId){
                                                continue;
                                            }
                                            if($subNavLang['navigationable_type'] == \App\Models\SubCategory::class) {
                                                $langId = $subNavLang->navigationable()->where('lang_id',getFrontSelectLanguage())->exists();
                                            }
                                        }
                                    @endphp
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  fs-14 fw-6 {{ $menuName == ucfirst(last(request()->segments()))
                                                ? 'active': '' }}" aria-current="page"
                                           @if(($navigation->navigationable->link) !== Null)
                                           href="{{getNavUrl($navigation->navigationable->link)}}"
                                           @else
                                           href="{{route('categoryPage',$navigation->navigationable->slug)}}"
                                            @endif
                                        >{!! ($navigation->navigationable->name) ? $navigation->navigationable->name :                                                                      $navigation->navigationable->title !!}
                                            @if(($langId ||                                                                           $navigation->navigationable_type == \App\Models\Menu::class) && $isSubNav)
                                                <i class="fa-solid fa-angle-down icon ms-1 fs-12"></i>
                                            @endif
                                        </a>
                                        @if($langId || $navigation->navigationable_type == \App\Models\Menu::class)
                                            @if($isSubNav)
                                                <ul class="dropdown-nav ps-0">
                                                    @php
                                                        $path = basename(Request::path());
                                                    @endphp
                                                    @foreach($nav['navigationsTakeData'] as $key => $navSub)
                                                        @if($key == $navigation->id)
                                                            @foreach($navSub as $sub)
                                                                @if($sub->navigationable_type == \App\Models\SubCategory::class)
                                                                    @if( $sub->navigationable()->where('lang_id',
                                                                                    getFrontSelectLanguage())->exists())
                                                                        <li>
                                                                            <a class="fs-14 fw-6 {{ !empty($path) && $path == $sub->navigationable->slug ? 'active' : '' }}"
                                                                            @if(($sub->navigationable->link) !== Null)
                                                                                href="{{getNavUrl($sub->navigationable->link)}}"
                                                                           @else
                                                                               href="{{route('categoryPage',                                                                                                                ['category'=>$navigation->navigationable->slug,                                                                                               'slug'=>$sub->navigationable->slug])}}"
                                                                            @endif>{!! ($sub->navigationable->name) ?                                                                                                                 $sub->navigationable->name :
                                                                                          $sub->navigationable->title !!}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @else
                                                                    <li>
                                                                        <a class="fs-14 fw-6 {{ !empty($path) && $path == $sub->navigationable->slug ? 'active' : '' }}"
                                                                           @if(($sub->navigationable->link) !== Null)
                                                                           href="{{getNavUrl($sub->navigationable->link)}}"
                                                                           @else
                                                                           href="{{route('categoryPage',                                                                                                                ['category'=>$navigation->navigationable->slug,                                                                                               'slug'=>$sub->navigationable->slug])}}"
                                                                                @endif
                                                                        >{!! ($sub->navigationable->name) ?
                                                                                    $sub->navigationable->name :
                                                                                    $sub->navigationable->title !!}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        {{-- <li class="nav-item">
                            <a class="nav-link fs-14 fw-6 {{ ((Request::is('g')) || (Request::is('g/*'))) ? 'active' : '' }}" href="{{route('galleryPage')}}">{{ __('messages.details.gallery') }}</a>
                        </li> --}}
                        @if($nav['navigationsCount'] >= 7)
                            <li class="nav-item dropdown">
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="fa-solid fa-ellipsis "></i>
                                </a>
                                <ul class="dropdown-nav ps-0">
                                    @foreach($nav['navigationsSkipData'] as $key => $navigation)
                                        @if($navigation['navigationable']['lang_id'] == getFrontSelectLanguage() ||                                                                         $navigation->navigationable_type == \App\Models\Menu::class )
                                            @php
                                                $isSubNav = count($nav['navigationsSkipItem'][$navigation->id]) > 0 ;
                                                $subNavLangs = $nav['navigationsSkipItem'][$navigation->id] ;
                                                 $menuName = $navigation->navigationable->name ? $navigation->navigationable->name :                                                                      $navigation->navigationable->title;
                                                 $langId = false;
                                                 foreach($subNavLangs as $subNavLang) {
                                                     if($langId){
                                                         continue;
                                                     }
                                                     if($subNavLang['navigationable_type'] == \App\Models\SubCategory::class) {
                                                         $langId = $subNavLang->navigationable()->where('lang_id',
                                                         getFrontSelectLanguage())->exists();
                                                     }
                                                 }
                                            @endphp
                                            <li class="dropdown-sub-nav">
                                                <a href="{{ $navigation->navigationable_type == \App\Models\Menu::class ? $navigation->navigationable->link : route('categoryPage',$navigation->navigationable->slug)}}" class="fs-14 fw-6 d-flex justify-content-between {{ $menuName == ucfirst(last(request()->segments())) ? 'active': '' }}">
                                                    {!! ($navigation->navigationable->name) ?
                                                                $navigation->navigationable->name :
                                                                $navigation->navigationable->title !!}
                                                    @if(($langId ||                                                                                $navigation->navigationable_type == \App\Models\Menu::class) && $isSubNav)
                                                        <i class="fa-solid fa-angle-right fs-12 "></i>
                                                    @endif
                                                </a>
                                                @if($langId || $navigation->navigationable_type == \App\Models\Menu::class )
                                                    @if($isSubNav)
                                                        <ul class="dropdown-sub-list ps-0">
                                                            @foreach($nav['navigationsSkipItem'] as $key => $navSub)
                                                                @if($key == $navigation->id)
                                                                    @foreach($navSub as $sub)
                                                                        @if($sub->navigationable_type == \App\Models\SubCategory::class)
                                                                            @if( $sub->navigationable()->where('lang_id',
                                                                                                getFrontSelectLanguage())->exists())
                                                                                <li>
                                                                                    <a class="fs-14 fw-6" @if(($sub->navigationable->link) !== Null)
                                                                                       href="{{getNavUrl($sub->navigationable->link)}}"
                                                                                       @else
                                                                                       href="{{route('categoryPage',                                                                                                                ['category'=>$navigation->navigationable->slug,                                                                                               'slug'=>$sub->navigationable->slug])}}"
                                                                                            @endif
                                                                                    >{!! ($sub->navigationable->name) ?                                                                                                                 $sub->navigationable->name :
                                                                                                  $sub->navigationable->title !!}
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li>
                                                                                <a class="fs-14 fw-6" @if(($sub->navigationable->link) !== Null)
                                                                                   href="{{getNavUrl($sub->navigationable->link)}}"
                                                                                   @else
                                                                                   href="{{route('categoryPage',                                                                                                                ['category'=>$navigation->navigationable->slug,                                                                                               'slug'=>$sub->navigationable->slug])}}"
                                                                                        @endif
                                                                                >{!! ($sub->navigationable->name) ?
                                                                                            $sub->navigationable->name :
                                                                                            $sub->navigationable->title !!}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach

                                    <li class="">
                                        <a class="fs-14 fw-6 d-flex justify-content-between {{ 'Contact' == ucfirst(last(request()->segments())) ? 'active': '' }}" href="{{route('contact.index')}}">{{ __('messages.details.contact_us') }}</a>
                                    </li>

                                    <li class="{{ $nav['pages']->count() > 0 ? 'dropdown-sub-nav' : ''}}">
                                        @if($nav['pages']->count() > 0)
                                        <a href="#" class="fs-14 fw-6 d-flex justify-content-between {{ 'Page' == ucfirst(last(request()->segments())) ? 'active': '' }}">{{ __('messages.pages') }} <i class="fa-solid fa-angle-right fs-12 "></i>
                                        </a>
                                            <ul class="dropdown-sub-list ps-0">
                                                @foreach($nav['pages'] as $page)
                                                    <li>
                                                        <a class="fs-14 fw-6" href="{{route('pages.show-page-slug', $page->slug)}}">
                                                            {!!  $page->name !!}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </li>

                        @endif
                        @if($nav['navigationsCount'] <= 5)
                            <li class="nav-item">
                                <a class="nav-link fs-14 fw-6 {{ 'Semanário' == ucfirst(last(request()->segments())) ? 'active': '' }}" href="{{route('front.semanarioPdf')}}">{{ __('Semanário') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14 fw-6 {{ 'Diario' == ucfirst(last(request()->segments())) ? 'active': '' }}" href="{{route('front.diarioPdf')}}">{{ __('Diário') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14 fw-6 {{ 'Contact' == ucfirst(last(request()->segments())) ? 'active': '' }}" href="{{route('contact.index')}}">{{ __('messages.details.contact_us') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                @if($nav['pages']->count() > 0)
                                <a class="nav-link fs-14 fw-6 {{ 'Pages' == ucfirst(last(request()->segments())) ? 'active': '' }}" href="javascript:void(0)">{{ __('messages.pages') }}
                                        <i class="fa-solid fa-angle-down icon ms-1 fs-12"></i>
                                </a>
                                @endif
                                @if($nav['pages']->count() > 0)
                                    <ul class="dropdown-nav ps-0">
                                        @foreach($nav['pages'] as $page)
                                            <li>
                                                <a class="fs-14 fw-6" href="{{route('pages.show-page-slug', $page->slug)}}">
                                                    {!! $page->name !!}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="col-lg-1">
                <div class="dropdown header-icon d-lg-flex  justify-content-end d-none position-relative">
                    <button class="dropdown-toggle border-0 bg-transparent position-relative me-4" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <a href="javascript:void(0)"><i class="fa-solid fa-magnifying-glass fs-20 "></i></a>
                    </button>
                    <div class="dropdown-menu" >
                        <form action="{{ route('allPosts') }}" class="form search-form-box search-input">
                            <div class="form-group border-0 search-input">
                                <input type="text" name="search" id="search" placeholder="Search..." class="form-control bg-light rt-search-control custom-input-control search-input mb-0" value="">
                                <button type="submit" class="search-submit custom-submit search-input">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars  fs-20"></i>
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <a type="button" class="closebtn text-reset text-black" data-bs-dismiss="offcanvas" aria-label="Close">&times;</a>
                        <div class="offcanvas-content pt-60">
                            <div class="news-logo mb-5">
                                <a href="/">
                                    <img src="{{ $settings['logo'] }}" alt="" class="w-100 h-100" />
                                </a>
                            </div>
                            <div class="contact-desc">
                                <h3 class="text-black fw-7 mb-4">{{__('messages.setting.contact_information')}}</h3>
                                <div class="desc d-flex  mb-4">
                                    <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-location-dot  text-white"></i>
                                    </div>
                                    <a class="fs-14 text-black mb-0  ps-4">{!! $settings['contact_address'] !!}</a>
                                </div>
                                <div class="desc d-flex align-items-sm-center mb-4">
                                    <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-envelope  text-white"></i>
                                    </div>
                                    <a href="{{"mailto:".$settings['email']}}" class="fs-14 text-black mb-0  ps-4 d-flex  align-items-center"><span class="__cf_email__">{{$settings['email']}}</span></a>
                                </div>
                                <div class="desc d-flex align-items-sm-center mb-4 ">
                                    <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-phone  text-white"></i>
                                    </div>
                                    <a href="tel:+91 70963 36561"
                                       class="fs-14 text-black mb-0  ps-4 -flex  align-items-center">{{$settings['contact_no']}}</a>
                                </div>
                            </div>
                            <div class="social-icon d-flex  mt-4 flex-wrap">
                                <a href="{{$settings['facebook_url']}}" target="_blank"> <i class="fa-brands fa-facebook-f text-gray fs-18 me-3"></i> </a>
                                <a href="{{$settings['twitter_url']}}" target="_blank"> <i class="fa-brands fa-twitter text-gray fs-18 me-3"></i> </a>
                                <a href="{{$settings['linkedin_url']}}" target="_blank"> <i class="fa-brands fa-linkedin-in  text-gray fs-18 me-3"></i></a>
                                <a href="{{$settings['pinterest_url']}}" target="_blank"> <i class="fa-brands fa-pinterest text-gray fs-18 me-3"></i></a>
                                <a href="{{$settings['instagram_url']}}" target="_blank"> <i class="fa-brands fa-instagram  text-gray fs-18 me-3"></i></a>
                                <a href="{{$settings['vk_url']}}" target="_blank"> <i class="fa-brands fa-vk text-gray fs-18 me-3"></i></a>
                                <a href="{{$settings['telegram_url']}}" target="_blank"> <i class="fa-brands fa-telegram text-gray fs-18 me-3"></i></a>
                                <a href="{{$settings['youtube_url']}}" target="_blank"> <i class="fa-brands fa-youtube text-gray fs-18 "></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- end header section -->
