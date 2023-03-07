
<header class='d-flex align-items-center justify-content-between flex-grow-1 header px-3 px-xl-0'>
    <button type="button" class="btn px-0 aside-menu-container__aside-menubar d-block d-xl-none sidebar-btn">
        <i class="fa-solid fa-bars fs-1"></i>
    </button>
    <nav class="navbar navbar-expand-xl navbar-light top-navbar d-xl-flex d-block px-3 px-xl-0 py-4 py-xl-0 "
         id="nav-header">
        <div class="container-fluid">
            <div class="navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @include('layouts.sub_menu')
                </ul>
            </div>
        </div>
    </nav>
    <ul class="nav align-items-center">
        <li class="px-sm-3 px-2">
            <a href="#" id="gotoFullScreen" title="Fullscreen"><i class="fas fa-expand fs-2"></i></a>
        </li>
        <li class="px-xxl-3 px-2">
            @if(Auth::user()->dark_mode)
                <a href="javascript:void(0)" data-turbo="false" title="Switch to Light mode">
                    <i class="fa-solid fa-moon text-primary fs-2 apply-dark-mode"></i>
                </a>
            @else
                <a href="javascript:void(0)" data-turbo="false" title="Switch to Dark mode">
                    <i class="fa-solid fa-sun text-primary fs-2 apply-dark-mode"></i></a>
            @endif
        </li>
        <li class="px-sm-3 px-2">
            <div class="dropdown d-flex align-items-center py-4">
                <div class="image image-circle image-mini">
                    <img src="{{ getLogInUser()->profile_image }}"
                         class="img-fluid object-cover" alt="profile image">
                </div>
                <button class="btn dropdown-toggle ps-2 pe-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    {{ getLogInUser()->full_name }}
                </button>
                <div class="dropdown-menu py-7 pb-4 my-2" aria-labelledby="dropdownMenuButton1">
                    <div class="text-center border-bottom pb-5">
                        <div class="image image-circle image-tiny mb-5">
                            <img src="{{ getLogInUser()->profile_image }}" class="img-fluid" alt="profile image">
                        </div>
                        <h3 class="text-gray-900">{{ getLogInUser()->full_name }}</h3>
                        <h4 class="mb-0 fw-400 fs-6">{{ getLogInUser()->email }}</h4>
                    </div>
                    <ul class="pt-4">
                        <li>
                            <a class="dropdown-item text-gray-900 cursor-pointer" href="{{ route('profile.setting') }}">
                            <span class="dropdown-icon me-4 text-gray-600">
                                <i class="fa-solid fa-user"></i>
                            </span>
                                {{ __('messages.user.account_setting') }}
                            </a>
                        </li>
                        @if(Auth::user()->hasRole('customer'))
                            <li>
                                <a class="dropdown-item text-gray-900 cursor-pointer"
                                   href="{{ route('subscription.index') }}">
                            <span class="dropdown-icon me-4 text-gray-600">
                                <i class="fa-solid fa-money-bill"></i>
                            </span>
                                    {{ __('messages.subscription.manage_subscription') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item text-gray-900 cursor-pointer" id="changePassword">
                                <span class="dropdown-icon me-4 text-gray-600">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                {{ __('messages.user.change_password') }}
                            </a>
                        </li>

                        <li>
                            <div class="dropdown dropdown-hover">
                                <a class="dropdown-item text-gray-900" href="#" id="changeLanguage">
                                   <span class="dropdown-icon me-4 text-gray-600">
                                       <i class="fa-solid fa-globe"></i>
                                   </span>
                                    {{__('messages.common.language')}}
                                </a>
                                <ul class="dropdown-menu rounded-10 px-5 py-3 d-block end-100">
                                    @foreach(getLanguageSet() as $key => $language)
                                        <li>
                                            <a data-id="{{ $key }}"
                                               class="dropdown-item text-hover-primary backendLanguage {{ getLogInUser()->language == $key ? 'text-primary' : 'text-gray-900' }}"
                                               href="#" >
                                            {{ $language }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-item text-gray-900 d-flex cursor-pointer">
                                <span class="dropdown-icon me-4 text-gray-600">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>
                                <form id="logout-form" action="{{ route('logout')}}" method="post">
                                    @csrf
                                </form>
                                <span onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                    {{ __('auth.sign_out') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <button type="button" class="btn px-0 d-block d-xl-none header-btn pb-2">
                <i class="fa-solid fa-bars fs-1"></i>
            </button>
        </li>
    </ul>
</header>
<div class="bg-overlay" id="nav-overly"></div>
