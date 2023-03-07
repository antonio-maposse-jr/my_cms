@extends('layouts.app')
@section('title')
    {{__('messages.post.post_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            @if(Auth::user()->hasRole('customer'))
                <a class="btn btn-outline-primary float-end" href="{{ route('customer-posts.index')}}">
                    {{ __('messages.common.back') }}
                </a>
            @endif
            @if(!Auth::user()->hasRole('customer'))
                <a class="btn btn-outline-primary float-end" href="{{ route('posts.index')}}">
                    {{ __('messages.common.back') }}
                </a>
            @endif
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1>{{$post->title}}</h1>
                <p>{{$post->description}}</p>

                <div class="row">
                    <div class="col-6 mt-3">
                        <h5>{{__('messages.post.visibility')}}</h5>
                        <span class="badge bg-{{($post->visibility == \App\Models\Post::VISIBILITY_ACTIVE) ? 'primary' : 'danger'}}  fs-7 m-1 ">
                {{($post->visibility == \App\Models\Post::VISIBILITY_ACTIVE) ? __('messages.common.on') : __('messages.common.off')}}
             </span>
                    </div>
                    <div class="col-6 mt-3">
                        <h5>{{__('messages.status')}}</h5>
                        <span class="badge bg-{{($post->status == \App\Models\Post::STATUS_ACTIVE) ? 'success' : 'danger'}}  fs-7 m-1 ">
                   {{($post->status == \App\Models\Post::STATUS_ACTIVE) ? __('messages.post.publish') : __('messages.post.draft_post')}}
                    </span>
                    </div>
                    <div class="col-6 mt-3">
                        <h5>{{__('messages.common.created_by')}}</h5>
                        <p>{{$post->user->full_name}}</p>
                    </div>
                    <div class="col-6 mt-3">
                        <h5>{{__('messages.post.category')}}</h5>
                        <p>{{$post->category->name}}</p>
                    </div>
                    <div class="col-6 mt-3">
                        <h5>{{__('messages.common.language')}}</h5>
                        <p>{{$post->language->name}}</p>
                    </div>
                    <div class="col-6 mt-3">
                        <h5>{{__('messages.rss-feed')}}</h5>
                        <span class="badge bg-{{($post->is_rss == \App\Models\Post::VISIBILITY_ACTIVE) ? 'primary' : 'danger'}}  fs-7 m-1 ">
                {{($post->is_rss == \App\Models\Post::VISIBILITY_ACTIVE) ? 'Yes' : 'No'}}
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="post-reaction">
                            <h4 class="title-reactions mt-3 mb-3">Post Reaction</h4>
                            <div class="post-reaction-div mt-10">
                                <div class="row">
                                    <div class="post-reaction">
                                        @foreach($emojis as $emoji)
                                            <div class="emoji">
                                                <div>
                                                    <div class="d-block position-relative text-center float-left">
                                                        <span class="emoji-id" data-emoji="{{$emoji->id}}"> 
                                                            {{ html_entity_decode($emoji->emoji) }}
                                                        </span>
                                                        <label class="post-reaction-count  like-reaction" id="{{$emoji->id}}">
                                                            {{isset($countEmoji[$emoji->id]) ? count($countEmoji[$emoji->id]) : 0}}
                                                        </label>
                                                        <p class="fs-12 mb-0">{{ __('messages.reaction.'.$emoji->name) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
