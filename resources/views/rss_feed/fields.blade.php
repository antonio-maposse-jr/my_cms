<div class="row">
    <div class="col-6">
        {{ Form::label('feed_name', __('messages.rss_feed.feed_name').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::text('feed_name', isset($rssFeed) ? $rssFeed->feed_name : null, ['class' => 'form-control form-control-solid mb-3', 'placeholder' => __('messages.rss_feed.feed_name'), 'required']) }}
    </div>
    <div class="col-6">
        {{ Form::label('feed_url', __('messages.rss_feed.feed_url').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::url('feed_url', isset($rssFeed) ? $rssFeed->feed_url : null, ['class' => 'form-control form-control-solid mb-3', 'placeholder' => __('messages.rss_feed.feed_url'), 'required']) }}
    </div>
    <div class="col-6">
        {{ Form::label('no_post', __('messages.rss_feed.no_posts').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::number('no_post', isset($rssFeed) ? $rssFeed->no_post : null, ['class' => 'form-control form-control-solid mb-3', 'placeholder' => __('messages.rss_feed.no_posts'), 'required']) }}
    </div>
    <div class="col-6">
        {{ Form::label('language_id', __('messages.common.select_language').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::select('language_id', getLanguage(), null, ['class' => 'form-select form-select-solid rssFeedLanguageId mb-3', 'id' => 'rssFeedLanguageId', 'placeholder' =>__('messages.common.select_language'), 'data-control' => 'select2','required']) }}
    </div>
    <div class="col-6 mb-3">
        {{ Form::label('category_id', __('messages.common.select_category').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::select('category_id', [], null, ['class' => 'form-select form-select-solid rssFeedCategoryId mb-3', 'id' => 'rssFeedCategoryId', 'placeholder' =>__('messages.common.select_category'), 'data-control' => 'select2','required']) }}
    </div>
    <div class="col-6 mb-3">
        {{ Form::label('subcategory_id', __('messages.common.select_subcategory').':', ['class' => 'fs-5  form-label mb-2']) }}
        {{ Form::select('subcategory_id', [], null, ['class' => 'form-select form-select-solid rssFeedSubCategoryId ', 'id' => 'rssFeedSubCategoryId', 'placeholder' =>__('messages.common.select_subcategory'), 'data-control' => 'select2',]) }}
    </div>
    
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('auto_update', __('messages.rss_feed.auto_update').':', ['class' => 'form-label required']) }}
            <div class="d-flex justify-content-between align-self-center">
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="auto_update" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::YES}}"
                               {{isset($rssFeed) ? ($rssFeed->auto_update  == \App\Models\RssFeed::YES ? 'checked' : '') : 'checked'}}>
                        {{--                                   value="{{ \App\Models\RssFeed::ORIGINAL}}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::ORIGINAL) ? 'checked' : '' }}>--}}
                        {{ __('messages.rss_feed.yes') }}
                    </label>
                </div>
              
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="auto_update" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::NO}}"  {{ isset($rssFeed) ? ($rssFeed->auto_update  == \App\Models\RssFeed::NO ? 'checked' : '') : null}}> 
                        {{--                                   value="{{ \App\Models\RssFeed::MySERVER }}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::MySERVER) ? 'checked' : '' }}>--}}
                        {{ __('messages.rss_feed.no') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('show_btn', __('messages.rss_feed.show_btn').':', ['class' => 'form-label required']) }}
            <div class="d-flex justify-content-between align-self-center">
                <div class="d-inline-block col-6"> 
                    <label class="form-check form-check-custom">
                        <input name="show_btn" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::YES}}" 
                                {{isset($rssFeed) ? ($rssFeed->show_btn  == \App\Models\RssFeed::YES ? 'checked' : '') : 'checked'}}>
                        {{--                                   value="{{ \App\Models\RssFeed::ORIGINAL}}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::ORIGINAL) ? 'checked' : '' }}>--}}
                        {{ __('messages.rss_feed.yes') }}
                    </label>
                </div>
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="show_btn" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::NO}}" 
                                {{isset($rssFeed) ? ($rssFeed->show_btn  == \App\Models\RssFeed::NO ? 'checked' : '') : null}}>
                        {{--                                   value="{{ \App\Models\RssFeed::MySERVER }}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::MySERVER) ? 'checked' : '' }}>--}}
                        {{ __('messages.rss_feed.no') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('post_draft', __('messages.rss_feed.add_posts').':', ['class' => 'form-label required']) }}
            <div class="d-flex justify-content-between align-self-center">
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="post_draft" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::YES}}" 
                                {{isset($rssFeed) ? ($rssFeed->post_draft  == \App\Models\RssFeed::YES ? 'checked' : '') : null}}>
                        {{--                                   value="{{ \App\Models\RssFeed::ORIGINAL}}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::ORIGINAL) ? 'checked' : '' }}>--}}
                        {{ __('messages.rss_feed.yes') }}
                    </label>
                </div>
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="post_draft" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::NO}}" 
                                {{isset($rssFeed) ? ($rssFeed->post_draft  == \App\Models\RssFeed::NO ? 'checked' : '') : 'checked'}}>
                        {{--                                   value="{{ \App\Models\RssFeed::MySERVER }}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::MySERVER) ? 'checked' : '' }}>--}}
                        {{ __('messages.rss_feed.no') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary m-0',]) }}
        <a href="{{ route('rss-feed.index') }}" type="reset"
           class="btn btn-secondary my-0  me-0">{{__('messages.common.discard')}}</a>
    </div>
</div>
