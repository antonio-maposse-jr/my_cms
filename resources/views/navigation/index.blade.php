@extends('layouts.app')
@section('title')
    {{__('messages.navigation')}}
@endsection
@section('page_css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
{{--            <a class="btn btn-outline-primary float-end"--}}
{{--               href="">{{ __('messages.common.back') }}</a>--}}
        </div>
        <div class="col-12">
            @include('layouts.errors')
            @include('flash::message')
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-12 col-sm-3 ms-auto mb-7">
                    {{ Form::select('lang_id', getLanguage(), getSelectLanguage(), ['class' => 'form-select languageId ', 'id' => 'navigationLanguageSelectId', 'data-control' => 'select2','required']) }}
                </div>
                <form class="form" id="navigationUpdateForm" method="POST">
                    <div class="mb-5 border border-gray-300" data-id="">
                        <h2 class="accordion-header py-4 px-5" id="">
                                <span class="fs-4 fw-bold collapsed" >
                                    {{ __('messages.home') }}
                                </span>
                        </h2>
                    </div>
                    <div class="accordion draggable-zone" id="accordionExample">
                        @foreach($navigations as  $navigation)
                            @if($navigation['navigationable']['lang_id'] == getSelectLanguage() || 
                               $navigation->navigationable_type == \App\Models\Menu::class )
                                <div class="accordion-item draggable mb-5 border border-gray-300" data-id="{{$navigation['id']}}">
                                    <h2 class="accordion-header" id="headingOne_{{$navigation['id']}}">
                                        <input type="hidden" name="navigation_id[]" value="{{$navigation['id']}}">
                                        <button class="accordion-button fs-4 fw-bold collapsed " type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne_{{$navigation['id']}}"
                                                aria-expanded="false"
                                                aria-controls="collapseOne_{{$navigation['id']}}">
                                            {!! ($navigation['navigationable']['name']) ? $navigation['navigationable']['name'] : $navigation['navigationable']['title'] !!}
                                        </button>
                                    </h2>
                                    <div id="collapseOne_{{$navigation['id']}}"
                                         class="accordion-collapse collapse draggable-zone"
                                         aria-labelledby="headingOne_{{$navigation['id']}}"
                                         data-bs-parent="#accordionExample">
                                        @foreach($navigationSubs[$navigation->id] as $navSub)
                                            @if($navSub['parent_id'] == $navigation['navigationable_id'] && 
                                                $navSub['navigationable']['lang_id'] == getSelectLanguage() ||
                                                 $navigation->navigationable_type == \App\Models\Menu::class )
                                                <div class="accordion-body {{$loop->last ? '' : 'border-bottom' }}">
                                                    <input type="hidden" name="sub_menu_id[{{$navigation['id']}}][]"
                                                           value="{{$navSub['id']}}">
                                                    <h6 class="text-gray-600 ms-3">{!! ($navSub['navigationable']['name']) ? $navSub['navigationable']['name'] : $navSub['navigationable']['title'] !!}</h6>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="mb-5 border border-gray-300" data-id="">
                        <h2 class="accordion-header py-4 px-5" id="">
                                <span class="fs-4 fw-bold collapsed" >
                                    {{ __('messages.Gallery') }}
                                </span>
                        </h2>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{ asset('assets/js/sortable.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/navigation/navigation.js')}}"></script>--}}
{{--@endsection--}}
