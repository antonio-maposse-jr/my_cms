@include('flash::message')
@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<div class="pt-7">
<ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="subAnalytics" role="tablist">
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{ (isset($sectionName) && $sectionName == 'general') ? 'active' : ''}}"
           href="{{ route('setting.index',['section' => 'general']) }}">{{ __('messages.setting.general') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{ (isset($sectionName) && $sectionName == 'contact_information') ? 'active' : ''}}"
           href="{{ route('setting.index',['section' => 'contact_information']) }}">{{ __('messages.setting.contact_information') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{ (isset($sectionName) && $sectionName == 'social_media') ? 'active' : ''}}"
           href="{{ route('setting.index',['section' => 'social_media']) }}">{{ __('messages.setting.social_media_setting') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{ (isset($sectionName) && $sectionName == 'cookie_warning') ? 'active' : ''}}"
           href="{{ route('setting.index',['section' => 'cookie_warning']) }}">{{ __('messages.setting.cookie_warning') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{ (isset($sectionName) && $sectionName == 'cms') ? 'active' : ''}}"
           href="{{ route('setting.index',['section' => 'cms']) }}" data-turbo="false">{{ __('messages.setting.cms') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{ (isset($sectionName) && $sectionName == 'ad_management') ? 'active' : ''}}"
           href="{{ route('setting.index',['section' => 'ad_management']) }}">{{ __('messages.ad_space.ad_management') }}</a>
    </li>
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <a class="nav-link p-0 {{ (isset($sectionName) && $sectionName == 'generate_sitemap') ? 'active' : ''}}"
           href="{{ route('setting.index',['section' => 'generate_sitemap']) }}">{{ __('messages.setting.generate_sitemap') }}</a>
    </li>
</ul>
</div>

