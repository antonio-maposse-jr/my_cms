<div class="col-xl-8 mb-xl-0 mb-6">
    <div class="card">
        <div class="card-body">
            <div>
                <div class="p-0">

                    @if($sectionType != \App\Models\Post::OPEN_AI_ACTIVE)
                        <div class="mb-5">
                            <input type="hidden" name="id" id="hiddenId" value="{{ !empty($post) ? $post->id : null }}">
                            {{ Form::label('title', __('messages.common.title').':', ['class' => 'form-label required']) }}
                            {{ Form::text('title', isset($post) ? $post->title : old('title'), ['class' => 'form-control', 'placeholder' =>  __('messages.common.title'), 'required' ,'id'=>'postTitle']) }}

                        </div>
                    @else
                        <div class="mb-5">
                            {{ Form::label('title', __('messages.common.title').':', ['class' => 'form-label required']) }}
                            <input type="hidden" name="id" id="hiddenId" value="{{ !empty($post) ? $post->id : null }}">
                            <div class="d-flex">
                            {{ Form::text('title', isset($post) ? $post->title : old('title'), ['class' => 'form-control', 'placeholder' =>  __('messages.common.title'), 'required' ,'id'=>'postTitle']) }}
                                <button type="button" class="btn btn-primary ms-3 w-25" id="OpenAiCall" data-role="{{getLoginUserRole()}}">{{__('messages.ai.generate_content')}}</button>
{{--                                <a href="{{route('open_ai')}}" class="btn btn-primary ms-3 w-25">--}}
{{--                                    <i class="fa-solid fa-bars"></i>--}}
{{--                                </a>--}}
                                <button class="btn btn-primary ms-3 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> <i class="fa-solid fa-bars"></i></button>

                            </div>
                        </div>

                    @endif
                </div>
                <div class="px-0">
                    <div class="mb-5">
                        {{ Form::label('slug', __('messages.common.slug').':', ['class' => 'form-label required ']) }}
                        {{ Form::text('slug', isset($post) ? $post->slug : old('slug'), ['class' => 'form-control', 'placeholder' =>  __('messages.common.slug'), 'required' ,'id'=>'postSlug']) }}
                        {{ Form::hidden('hidden_slug', isset($post) ? $post->slug : old('slug'), ['id'=>'postHiddenSlug']) }}
                    </div>
                </div>
                <div class="px-0">
                    <div class="mb-5">
                        {{ Form::label('short_description', __('messages.post.short_description').':', ['class' => 'form-label required ']) }}
                        {{ Form::textarea('description', isset($post) ? $post->description : old('description'), ['class' => 'form-control','id' => 'description', 'placeholder' =>  __('messages.post.short_description'), 'required','rows'=>'3']) }}
                    </div>
                </div>
                <div class="px-0">
                    <div class="mb-5">
                        {{ Form::label('keywords', __('messages.post.keywords').':', ['class' => 'form-label required']) }}
                        {{ Form::text('keywords', isset($post) ? $post->keywords : old('keywords'), ['class' => 'form-control', 'placeholder' =>  __('messages.post.keywords'), 'required']) }}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <label class="form-label">{{__('messages.post.visibility')}}</label>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-5">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px is-active" name="visibility"
                                       type="checkbox"
                                       value="1" {{ !empty($post) && $post->visibility == 1 ? 'checked' :
                                        (old('visibility') ? 'checked' : '' ) }}>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <label
                                class="form-label">{{__('messages.post.add_to_featured')}}</label>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-5">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px is-active" name="featured" type="checkbox"
                                       value="1" {{ !empty($post) && $post->featured == 1 ? 'checked' :
                                        (old('featured') ? 'checked' : '' ) }} >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <label
                                class="form-label">{{__('messages.post.add_on_headline')}}</label>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-5">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px is-active" name="show_on_headline"
                                       type="checkbox"
                                       value="1" {{ !empty($post) && $post->show_on_headline == 1 ? 'checked' :
                                        (old('show_on_headline') ? 'checked' : '' ) }} >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <label
                                class="form-label">{{__('messages.post.add_to_breaking')}}</label>
                    </div>
                    <div class="col-lg-2 mb-4 ">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="breaking"
                                   value="1" {{ !empty($post) && $post->breaking == 1 ? 'checked' :
                                    (old('breaking') ? 'checked' : '' ) }} >
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <label
                                class="form-label">{{__('messages.post.add_to_slider')}}</label>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="slider"
                                   value="1" {{ !empty($post) && $post->slider == 1 ? 'checked' :
                                    (old('slider') ? 'checked' : '' ) }} >
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <label
                                class="form-label">{{__('messages.post.add_to_recommended')}}</label>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="recommended"
                                   value="1" {{ !empty($post) && $post->recommended == 1 ? 'checked' :
                                   (old('recommended') ? 'checked' : '' ) }} >
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <label
                                class="form-label">{{__('messages.post.show_registered_user')}}</label>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="show_registered_user"
                                   value="1" {{ !empty($post) && $post->show_registered_user == 1 ? 'checked' :
                                   (old('show_registered_user') ? 'checked' : '' ) }} >
                        </div>
                    </div>
                </div>
                <div class="px-0">
                    <div class="mb-5">
                        {{ Form::label('tags', __('messages.post.tag').':', ['class' => 'form-label required']) }}
                        <div class="mb-5">
                            <input class="form-control" name="tags" id="postTag"
                                   value="{{ isset($post) ? html_entity_decode($post->tags) : (old('tags') ? old('tags') : "") }}"/>
                        </div>
                    </div>
                </div>
{{--                <div class="px-0">--}}
{{--                    <div class="mb-5">--}}
{{--                        {{ Form::label('optional_url', __('messages.post.optional_url').':', ['class' => 'form-label']) }}--}}
{{--                        {{ Form::url('optional_url', isset($post) ? $post->optional_url : old('optional_url'), ['class' => 'form-control form-control-solid', 'placeholder' =>__('messages.post.optional_url')]) }}--}}
{{--                    </div>--}}
{{--                </div>--}}
                @if($sectionType == \App\Models\Post::ARTICLE_TYPE_ACTIVE )
                    <button type="button" class="btn btn-primary mb-2 btn-add-image" data-role="{{getLoginUserRole()}}">
                        {{__('messages.post.add_image') }}
                    </button>
                    <textarea name="article_content" class="tox-target article-text-description form-control" rows="25" >
                    {!! $post->postArticle->article_content??old('article_content')!!}
                </textarea>
                @elseif($sectionType == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                    <button type="button" class="btn btn-primary mb-2 btn-add-image" data-role="{{getLoginUserRole()}}">
                        {{__('messages.post.add_image') }}
                    </button>
                    <textarea name="video_content" class="tox-target video-text-description form-control" rows="25">
                    {!! $post->postVideo->video_content??old('video_content')!!}
                </textarea>
                @elseif($sectionType == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                    <button type="button" class="btn btn-primary mb-2 btn-add-image" data-role="{{getLoginUserRole()}}">
                        {{__('messages.post.add_image') }}
                    </button>
                    <textarea name="audio_content" class="tox-target audio-text-description form-control" rows="25">
                    {!! $post->postAudios->audio_content??old('audio_content')!!}
                </textarea>

                @elseif($sectionType ==  \App\Models\Post::OPEN_AI_ACTIVE)

                    <button type="button" class="btn btn-primary mb-2 btn-add-image" data-role="{{getLoginUserRole()}}">
                        {{__('messages.post.add_image') }}
                    </button>
                    <textarea name="article_content" class="tox-target article-text-description form-control" id="article-text-description" rows="25">
                    {!! $post->postArticle->article_content?? old('article_content') !!}
                    </textarea>

                @endif

                @include('post.template.template')

                <div class="modal fade" id="postFileModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.post.image') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="file" class="form-control" id="newPostImage" name="image"
                                       accept=".png, .jpg, .jpeg">
                                <div class="row uploaded-post-img pt-10 custom-scroll">
                                </div>
                            </div>
                            <div class="modal-footer p-2 d-none justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-danger  image-delete-btn">
                                        {{ __('messages.delete') }}
                                    </button>
                                </div>
                                <button type="button" class="btn btn-primary select-post-image">
                                    {{__('messages.post.select_image') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4">
    @if($sectionType == \App\Models\Post::VIDEO_TYPE_ACTIVE)
        <div class="card mb-6">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-video-tab" data-bs-toggle="tab" data-bs-target="#nav-video" type="button" role="tab" aria-controls="nav-video-tab" aria-selected="true"> {{ __('messages.post.get_video') }}</button>
                        <button class="nav-link" id="nav-upload-video-tab" data-bs-toggle="tab" data-bs-target="#nav-upload-video" type="button" role="tab" aria-controls="nav-upload-video-tab" aria-selected="false">{{ __('messages.post.upload_video') }}</button>
                    </div>
                </nav>
                <div class="tab-content mt-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-video" role="tabpanel" aria-labelledby="nav-video-tab">
                        <div class="getVideoUrl">
                            <label for="" class="form-label"> {{ __('messages.post.video_url') }} :</label>
                            <small>{{ __('messages.post.spotted_video') }}</small>
                            {{ Form::text('video_url', !empty($post->postVideo) && !empty($post->postVideo->video_url) ? $post->postVideo->video_url : null, ['class' => 'form-control mb-3', 'placeholder' =>__('messages.post.video_url'),'id'=>'videoUrl']) }}
                            <button type="button" class="btn btn-primary text-white get-video-by-url d-flex ms-auto mb-4" id="getVideo"
                                    name="getVideo">{{__('messages.post.get_video') }}</button>
                            <label for="" class="form-label">{{__('messages.post.video_embed_code')}}:</label>
                            {{ Form::text('video_embed_code', !empty($post->postVideo) && !empty($post->postVideo->video_embed_code) ? $post->postVideo->video_embed_code : null, ['class' => 'form-control mb-5','readonly','placeholder' =>__('messages.post.video_embed_code'),'id'=>'embedVideoUrl']) }}
                            <div class="video_i_frame col-12">
                                @if(!empty($post->postVideo) && !empty($post->postVideo->video_embed_code))
                                    <iframe src="{{ $post->postVideo->video_embed_code }}" frameborder="0" width="280" height="250"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-upload-video" role="tabpanel" aria-labelledby="nav-upload-video-tab">
                        <div class="uploadVideo">
                            {{ Form::label('file',__('messages.post.upload_video'), ['class' => 'form-label mb-3'])}}
                            <input type="file" name="uploadVideo" class="form-control" id="uploadVideo" accept=".mp4,.mov,.mkv,.webm,.avi"/>
                            @php
                                $video = !empty($post->postVideo) && !empty($post->postVideo->uploaded_video);
                            @endphp
                            <video width="400" controls class="video-tag mt-3 col-12 {{ $video ?  : 'd-none' }}">
                                <source id="video_here" src="{{ $video ? $post->postVideo->uploaded_video : '' }}">
                            </video>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card mb-6">
            <div class="card-body">
                <div class="mb-3" io-image-input="true">
                    <label for="exampleInputImage" class="form-label required">{{__('messages.post.video_thumbnail')}}
                        :</label>
                    @php
                        $thumbUrl = !empty($post->postVideo) && !empty($post->postVideo->thumbnail_image_url) ? $post->postVideo->thumbnail_image_url : null;
                        $thumbImage = !empty($post->postVideo) && !empty($post->postVideo->uploaded_thumb) ? $post->postVideo->uploaded_thumb : asset('front_web/images/default.jpg')
                    @endphp
                    <div class="d-block">
                        <div class="image-picker">
                            <div class="image previewImage w-125px h-125px" id="thumbnailInputImage"
                                 style="background-image: url('{{ (!empty($thumbUrl) ? $thumbUrl : $thumbImage) }}')">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                  data-placement="top" data-bs-original-title="{{__('messages.common.change_image')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" name="thumbnailImage" class="image-upload d-none" id="thumbnailImage"
                                   accept=".png, .jpg, .jpeg, .webp, .svg"/>
                        </label>
                    </span>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="exampleInputImage" class="form-label">{{__('messages.post.or_add_url')}}:</label>
                    <small>{{__('messages.post.allowed_images_jpg_png_jpeg')}}</small>
                    {{ Form::url('thumbnail_image_url', !empty($post->postVideo) && !empty($post->postVideo->thumbnail_image_url) ? $post->postVideo->thumbnail_image_url : null, ['class' => 'form-control thumbnail-image-url', 'placeholder' =>  __('messages.post.or_add_url') ,'id'=>'thumbnailImageUrl']) }}
                </div>
            </div>
        </div>
    @else
        <div class="card mb-6">
            <div class="card-body">
                <div class="col-lg-3">
                    <div class="mb-3" io-image-input="true">
                        <label for="exampleInputImage" class="form-label required">{{__('messages.post.image')}}
                            :</label>
                        <div class="d-block">
                            <div class="image-picker">
                                <div class="image previewImage w-125px h-125px" id="exampleInputImage"
                                     style="background-image: url('{{ (!empty($post->post_image) ? $post->post_image : asset('front_web/images/default.jpg')) }}')">
                                </div>
                                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                      data-placement="top"
                                      data-bs-original-title="{{__('messages.common.change_image')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>

                            <input type="file" name="image" class="image-upload d-none" id="image"
                                   accept=".png, .jpg, .jpeg"/>
                        </label>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($sectionType == \App\Models\Post::ARTICLE_TYPE_ACTIVE)
        <div class="card mb-6">
            <div class="card-body">
                <div class="form-group">
                    <div class="mb-5 col-lg-12">
                        {{ Form::label('image',__('messages.post.additional'), ['class' => 'form-label mb-3'])}}
                        <input type="file" class="form-control" id="additionalImage" accept=".png, .jpg, .jpeg,.webp,.svg"
                               name="additional_images[]" multiple="multiple">
                    </div>
                    <div class="mb-5 col-lg-12">
                        <div class="row">
                            <div id="preview" class="additional-images">
                                @if(isset($post->additional_image))
                                    @foreach($post->additional_image as $image)
                                        <img src="{{ $image }}" class="border-color">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($sectionType == \App\Models\Post::AUDIO_TYPE_ACTIVE)
        <div class="card mb-6">
            <div class="card-body">
                <div class="mb-5 col-lg-12">
                    {{ Form::label('file',__('messages.post.audio'), ['class' => 'form-label mb-3'])}}
                    <input type="file" class="form-control" name="audios[]" multiple id="audios" accept=".mp3, .M4A,.wav,.aac,.wma" onchange="javascript:updateAudioList()"/>

                    <p class="mt-2">{{__('messages.post.selected_file')}} :</p>
                    <div id="audioFileList">
                        @if(isset($post))
                            @foreach($post->postAudios->post_audio as $audio)
                                <ul>
                                    <li>{{ basename($audio) }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($sectionType == \App\Models\Post::ARTICLE_TYPE_ACTIVE || $sectionType == \App\Models\Post::VIDEO_TYPE_ACTIVE || $sectionType == \App\Models\Post::AUDIO_TYPE_ACTIVE)
        <div class="card mb-6">
            <div class="card-body">
                <div class="mb-5 col-lg-12">
                    {{ Form::label('file',__('messages.post.file'), ['class' => 'form-label mb-3'])}}
                    <input type="file" class="form-control" name="file[]" multiple id="file"
                           onchange="javascript:updateList()"/>

                    <p class="mt-2">{{__('messages.post.selected_file')}} :</p>
                    <div id="fileList">
                        @if(isset($post->post_file))
                            @foreach($post['post_file'] as $file)
                                <ul>
                                    <li>{{ basename($file) }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(getLogInUserId() == App\Models\User::ADMIN)
        <div class="card mb-6">
            <div class="card-body">
                <div class="col-lg-12 px-0">
                    <div class="mb-5">
                        {{ Form::label('created_by', __('messages.common.created_by').':', ['class' => 'form-label mb-3']) }}
                        {{ Form::select('created_by',$allStaff, isset($post) ? $post->created_by :null, ['class' => 'form-select form-select-solid', 'placeholder' =>  __('messages.common.created_by'),'id'=>'postCreatedBy', 'data-control' => 'select2']) }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="card mb-6">
        <div class="card-body">
            <h6 class="mb-5">{{__('messages.post.category')}}</h6>
            <div class="col-lg-12 mb-7">
                <div class="mb-5 col-lg-12">
                    {{ Form::label('language',__('messages.page.language').' :', ['class' => 'form-label required  required']) }}
                    {{ Form::select('lang_id', getLanguage(), isset($post) ? $post->lang_id :null, ['class' => 'form-select form-select-solid languageId', 'id' => 'postLanguageId', 'placeholder' =>__('messages.common.select_language'), 'data-control' => 'select2','required']) }}
                </div>
            </div>

            <div class="col-lg-12 mb-7">
                <div class="mb-5 col-lg-12">
                    {{ Form::label('category_id',__('messages.post.category').' :', ['class' => 'form-label required required']) }}
                    {{ Form::select('category_id',isset($post) ?getLanguageCategory($post->lang_id):[], isset($post) ? $post->category_id :null, ['class' => 'form-select form-select-solid categoryId', 'id' => 'postCategoriesId', 'placeholder' =>  __('messages.common.select_category'), 'data-control' => 'select2','required']) }}
                </div>
            </div>

            <div class="col-lg-12 mb-7">
                <div class="mb-5 col-lg-12">
                    {{ Form::label('sub_category_id',__('messages.post.sub_category').' :', ['class' => 'form-label mb-3 ']) }}
                    {{ Form::select('sub_category_id',isset($post) ?getCategorySubCategory($post->category_id):[],isset($post) ? $post->sub_category_id :null, ['class' => 'form-select form-select-solid subCategoryId', 'id' => 'postSubCategoryId', 'placeholder' =>  __('messages.common.select_subcategory'), 'data-control' => 'select2']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row mt-2">
                <h6 class="mb-3">{{__('messages.post.publish') }}</h6>
                <div class="col-lg-8 mb-4">
                    <label
                            class="form-label">{{__('messages.post.scheduled_post') }}</label>
                    <input class="form-check-input ms-5" id="scheduledPost" type="checkbox" name="scheduled_post"
                           value="1"
                            {{ !empty($post) && $post->scheduled_post === 1 ? 'checked' : '' }}>
                </div>
                <div class="mb-5 d-none date-time">
                    <input type="text" name="scheduled_post_time" id="scheduledPostTime"  class="form-control {{(getLogInUser()->dark_mode) ? 'bg-light' : 'bg-white'}}" autocomplete="off" placeholder="{{__('messages.post.d&t')}}" value="{{isset($post) ? $post->scheduled_post_time : null}}">
                </div>
            </div>
            <div class="d-flex flex-wrap">
                <p>{{ __('messages.placeholder.clicking_on_submit_it_will_publish_your_post')}}</p>
                {{ Form::submit(__('messages.post.submit'),['class' => 'btn btn-primary me-2 mb-2 post-save-btn','id'=>'postSaveBtn']) }}
                <button class="btn btn-warning me-2 mb-2 post-save-btn text-white" value="1" id="postDraftBtn"
                        name="status">{{__('messages.post.draft') }}</button>
            </div>
        </div>
    </div>
</div>
@if($sectionType == \App\Models\Post::OPEN_AI_ACTIVE)
    <div class="post-offcanvas-container">
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="openAIFilterSidebarLabel">{{__('messages.ai.ai_filter')}}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mb-5">
            <span>{{__('messages.ai.model')}}</span>
            {{ Form::select('openai',\App\Models\Post::MODEL,\App\Models\Post::TEXT_DAVINCI_003, ['class' => 'form-select form-select-solid', 'id'=>'openAi', 'data-control' => 'select2']) }}

        </div>
        <div class="mb-5">
            <div class="d-flex justify-content-between">
            <span>{{__('messages.ai.temperature')}}</span>
                <input   id="TemperatureOutput" value="0"  min="0" max="1">
{{--            <output id="TemperatureOutput">0</output>--}}
            </div>
            <input type="range" id="Temperature"  class="form-range" data-bs-toggle="tooltip"
                   data-placement="top" data-bs-original-title="{{__('messages.placeholder.controls_randomness_lowering_results_in_less_random_completions')}}" value="0"  min="0" max="1" step="0.01" oninput="TemperatureOutput.value = Temperature.value">
        </div>
        <div class="mb-5">
            <div class="d-flex justify-content-between">
                <span>{{__('messages.ai.maximum_length')}}</span>
                <input   id="MaximumLengthOutput" value="100"  min="0" max="4000">
{{--                <output id="MaximumLengthOutput">100</output>--}}
            </div>
            <input type="range" id="MaximumLength" class="form-range" data-bs-toggle="tooltip"
                   data-placement="top" data-bs-original-title="{{__('messages.placeholder.the_maximum_number_of_tokens_to_generate_requests_can_use_up')}}" value="100"  min="1" max="4000"  oninput="MaximumLengthOutput.value = MaximumLength.value">
        </div>
        <div class="mb-5">
            <div class="d-flex justify-content-between">
                <span>{{__('messages.ai.top_p')}}</span>
                <input   id="topP" value="0" >

            </div>
            <input type="range" id="InputTopPId" class="form-range" value="0"  min="0" max="1" step="0.01" data-bs-toggle="tooltip"
                   data-placement="top" data-bs-original-title="{{__('messages.placeholder.controls_diversity_via_nucleus_sampling')}}"  oninput="topP.value = InputTopPId.value">
        </div>
        <div class="mb-5">
            <div class="d-flex justify-content-between">
                <span>{{__('messages.ai.best_of')}}</span>
                <input   id="BestOf" value="0" >

            </div>
            <input type="range" id="InputBestOfId" class="form-range" value="0"  min="0" max="20" step="0.01" data-bs-toggle="tooltip" data-bs-original-title="{{__('messages.placeholder.generates_multiple_completions_server_side')}}"  oninput="BestOf.value = InputBestOfId.value">
        </div>
    </div>
</div>
    </div>
@endif
@php
    $inStyle = 'style';
    $style   = 'cursor: default !important';
@endphp
@if($sectionType == \App\Models\Post::GALLERY_TYPE_ACTIVE)
    @if(isset($post->postGalleries))
        <div class="col-xl-8 mt-5">
            <h4><label class="required">{{__('messages.post.gallery_post_item') }}</label></h4>
            @foreach($post->postGalleries as $key => $postGallery)
                <div class="accordion mt-5" id="kt_accordion_{{$key+1}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header d-flex align-items-center border-bottom-0"
                            id="kt_accordion_{{$key+1}}_header_{{$key+1}}">
                            <button class="accordion-button accordion-button-{{ $postGallery->id }} fs-4 fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#kt_accordion_{{ $key+1 }}_body_{{ $key+1 }}" aria-expanded="true"
                                    aria-controls="kt_accordion_{{ $key+1 }}_body_{{ $key+1 }}" {{$inStyle}}="{{$style}}
                            "> {{$postGallery->gallery_title ?? null}}
                            </button>
                            <button type="button" title="Delete"
                                    class="btn px-2 text-danger fs-2 delete-gallery-item
                                                {{ $post->postGalleries->count() <= 1 ? 'd-none' :''}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </h2>
                        <div id="kt_accordion_{{ $key+1 }}_body_{{ $key+1 }}" class="accordion-collapse collapse show"
                             aria-labelledby="kt_accordion_{{ $key+1 }}_header_{{ $key+1 }}"
                             data-bs-parent="#kt_accordion_{{$key+1}}">
                            <div class="accordion-body border-top">
                                <div class="row">
                                    {{ Form::hidden('gallery_id[]',$postGallery->id ?? null, ['class' => 'form-control form-control-solid','id'=>'postGalleryId']) }}
                                    <div class="col-12 mb-5">
                                        <label
                                                class="form-label">{{ __('messages.common.title') }}</label>
                                        <input type="text" name="gallery_title[]"
                                               class="form-control form-control-solid                                                           {{$loop->first ? 'gallery-title' :''}} gallery-list-title-{{$postGallery->id}} gallery-list-title-text"
                                               id="postGalleryTitle"
                                               value="{{$postGallery->gallery_title ?? null}}"
                                               placeholder={{ __('messages.common.title') }} data-id="{{$postGallery->id}}">
                                    </div>
                                    <div class="col-md-3 mt-5">

                                        <div class="mb-3" io-image-input="true">
                                            <label for="exampleInputImage"
                                                   class="form-label">{{ __('messages.post.image') }}</label>
                                            <div class="d-block">
                                                <div class="image-picker">
                                                    <div class="image previewImage w-125px h-125px"
                                                         id="exampleInputImage"{{$styleCss}}="background-image: url('{{ !empty($postGallery->post_gallery_image)?$postGallery->post_gallery_image : asset('front_web/images/default.jpg')}}')">
                                                </div>
                                                <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                      data-bs-toggle="tooltip"
                                                      data-placement="top"
                                                      data-bs-original-title="{{__('messages.common.change_image')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="hidden" name="gallery_image_remove[]">
                            <input type="file" name="gallery_images[]" class="image-upload d-none" accept="image/*"/>
                        </label>
                    </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control form-control-solid"
                                               id="image_description"
                                               name="image_description[]"
                                               placeholder="{{__('messages.post.image_description') }}"
                                               maxlength="300"
                                               value="{{ !empty($postGallery->image_description) ? $postGallery->image_description : null }}">
                                    </div>
                                </div>
                                <div class="col-md-9 add-post-text-editor mt-md-0 mt-4">
                                    <button type="button" class=" btn btn-primary mb-2 btn-add-image">
                                        {{__('messages.post.add_image') }}
                                    </button>
                                    <textarea id="kt_docs_tinymce_plugins" name="gallery_content[]"
                                              class="tox-target text-gallery-description" height="200px">
                            {!! $postGallery->gallery_content ?? null !!}
                     </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        <div class="gallery-item-container">
            <span class="item-number"></span>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <button type="button" id="postAddItem" class="btn btn-md btn-success text-white btn-add-post-item">
                    {{__('messages.post.add_new_item') }}
                </button>
            </div>
        </div>
    @else
        <div class="mt-5 col-xl-8">
            <h4><label class="required">{{__('messages.post.gallery_post_item') }}</label></h4>
            <div class="accordion" id="kt_accordion_1">
                <div class="accordion-item">
                    <h2 class="accordion-header d-flex align-items-center border-bottom-0"
                        id="kt_accordion_1_header_1">
                        <button class="accordion-button accordion-button-1 fs-4 fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                aria-controls="kt_accordion_1_body_1" {{$inStyle}}="{{$style}}">
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                         aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body border-top">
                            <div class="row">
                                <div class="col-12 mb-5">
                                    <label class="form-label">{{ __('messages.common.title') }}</label>
                                    {{ Form::text('gallery_title[]',null, ['class' => 'form-control form-control-solid gallery-title gallery-list-title-1 gallery-list-title-text','id'=>'gallery_title','placeholder'=>__('messages.common.title'), 'data-id' =>1 ]) }}
                                </div>
                                <div class="col-md-3 mt-5">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="mb-3" io-image-input="true">
                                            <label for="exampleInputImage"
                                                   class="form-label">{{__('messages.post.image')}}:</label>
                                            <div class="d-block">

                                                <div class="image-picker">
                                                    <div class="image previewImage w-125px h-125px"
                                                         id="exampleInputImage"{{$inStyle}}="background-image:url('{{ !empty($post->post_image) ? $post->post_image:asset('front_web/images/default.jpg') }}')">
                                                </div>
                                                <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                      data-bs-toggle="tooltip"
                                                      data-placement="top"
                                                      data-bs-original-title="{{__('messages.common.change_image')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" name="gallery_images[]" class="image-upload d-none" accept="image/*"/>
                            <input type="hidden" name="gallery_image_remove[]">
                        </label>
                    </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control form-control-solid"
                                           name="image_description[]"
                                           id="image_description"
                                           placeholder="{{__('messages.post.image_description') }}"
                                           maxlength="300">
                                </div>
                            </div>
                            <div class="col-md-9 add-post-text-editor mt-md-0 mt-4">
                                <button type="button" class=" btn btn-primary mb-2 btn-add-image">
                                    {{__('messages.post.add_image') }}
                                </button>
                                <textarea id="kt_docs_tinymce_plugins" name="gallery_content[]"
                                          class="tox-target text-gallery-description" height="200px">
                                            {!! $post->content??null !!}
                                        </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-item-container">
            <span class="item-number"></span>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <button type="button" id="postAddItem" class="btn btn-md btn-success text-white btn-add-post-item">
                    {{__('messages.post.add_new_item') }}
                </button>
            </div>
        </div>
        </div>
    @endif
@endif
@if($sectionType == \App\Models\Post::SORTED_TYPE_ACTIVE)
    @if(isset($post->postSortLists))
        <div class="col-xl-8 mt-5">
            <h4><label class="required">{{__('messages.post.sort_list_item') }}</label></h4>
            @foreach($post->postSortLists as $key => $sortedList)
                <div class="accordion mt-5" id="kt_accordion_{{$key+1}}" >
                    <div class="accordion-item">
                        <h2 class="accordion-header d-flex align-items-center border-bottom-0"
                            id="kt_accordion_{{$key+1}}_header_{{$key+1}}">
                            <button class="accordion-button accordion-button-{{$sortedList->id}} fs-4 fw-bold" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#kt_accordion_{{ $key+1 }}_body_{{ $key+1 }}"
                                    aria-expanded="true"
                                    aria-controls="kt_accordion_{{ $key+1 }}_body_{{ $key+1 }}" {{$inStyle}}
                            ="{{$style}}" id="accordion_button_{{$sortedList->id}}"> {{ $sortedList->sort_list_title ?? null }}
                            </button>

                            <button type="button" title="Delete"
                                    class="btn px-2 text-danger fs-2 delete-sort_list-item
                                                {{ $post->postSortLists->count() <= 1 ? 'd-none' :'' }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </h2>
                        <div id="kt_accordion_{{ $key+1 }}_body_{{ $key+1 }}"
                             class="accordion-collapse collapse show"
                             aria-labelledby="kt_accordion_{{ $key+1 }}_header_{{ $key+1 }}"
                             data-bs-parent="#kt_accordion_{{$key+1}}">
                            <div class="accordion-body border-top">
                                <div class="row">
                                    {{ Form::hidden('sort_list_id[]',$sortedList->id ?? null, ['class' => 'form-control form-control-solid','id'=>'sort_list_id']) }}
                                    <div class="col-12 mb-5">
                                        <label
                                                class="form-label">{{ __('messages.common.title') }}</label>
                                        <input type="text" name="sort_list_title[]" class="form-control form-control-solid
                                                        {{$loop->first ? 'sort-list-title' :''}} sort-list-title-{{$sortedList->id}} sort-list-title-text"
                                               id="sortListTitle"
                                               value="{{ $sortedList->sort_list_title ?? null }}"
                                               placeholder={{ __('messages.common.title') }} data-id="{{$sortedList->id}}">
                                    </div>
                                    <div class="col-md-3 mt-5">
                                        <div class="mb-3" io-image-input="true">
                                            <label for="exampleInputImage"
                                                   class="form-label">{{__('messages.post.image')}}:</label>
                                            <div class="d-block">

                                                <div class="image-picker">
                                                    <div class="image previewImage" id="exampleInputImage"
                                                    {{$styleCss}}="background-image: url('{{ !empty($sortedList->post_sort_list_image) ? $sortedList->post_sort_list_image : asset('front_web/images/default.jpg') }}')">
                                                </div>
                                                <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                      data-bs-toggle="tooltip"
                                                      data-placement="top"
                                                      data-bs-original-title="{{__('messages.common.change_image')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" name="sorted_list_image[]" class="image-upload d-none" accept="image/*"/>
                        </label>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text"
                                               class="form-control form-control-solid"
                                               name="image_description[]" id="image_description"
                                               placeholder="{{__('messages.post.image_description') }}"
                                               maxlength="300"
                                               value="{{ $sortedList->image_description ?? null }}">
                                    </div>
                                </div>
                                <div class="col-md-9 add-post-text-editor mt-md-0 mt-4">
                                    <button type="button"
                                            class=" btn btn-primary mb-2 btn-add-image">
                                        {{__('messages.post.add_image') }}
                                    </button>
                                    <textarea id="kt_docs_tinymce_plugins"
                                              name="sort_list_content[]"
                                              class="tox-target text-sort_list-description"
                                              height="200px">
            {!! $sortedList->sort_list_content ?? null !!}
     </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        <div class="sort_list-item-container">
            <span class="item-number"></span>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <button type="button" id="addSortListItem" class="btn btn-md btn-success text-white btn-add-post-item">
                    {{__('messages.post.add_new_item') }}
                </button>
            </div>
        </div>
    @else
        <div class="col-xl-8 mt-5">
            <h4><label class="required">{{__('messages.post.sort_list_item') }}</label></h4>
            <div class="accordion" id="kt_accordion_1">
                <div class="accordion-item">
                    <h2 class="accordion-header d-flex align-items-center border-bottom-0"
                        id="kt_accordion_1_header_1">
                        <button class="accordion-button accordion-button-1 fs-4 fw-bold" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                aria-controls="kt_accordion_1_body_1" {{$inStyle}}="{{$style}}">
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                         aria-labelledby="kt_accordion_1_header_1"
                         data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body border-top">
                            <div class="row">
                                <div class="col-12 mb-5">
                                    <label class="form-label">{{ __('messages.common.title') }}</label>
                                    {{ Form::text('sort_list_title[]',null, ['class' => 'form-control sort-list-title sort-list-title-1 sort-list-title-text form-control-solid','id'=>'sortListTitle', 'placeholder'=>__('messages.common.title'), 'data-id'=>1 ]) }}
                                </div>
                                <div class="col-md-3 mt-5">
                                    <div class="mb-3" io-image-input="true">
                                        <label for="exampleInputImage" class="form-label">{{__('messages.post.image')}}:</label>
                                        <div class="d-block">
                                            <div class="image-picker">
                                                @php
                                                    $style = 'style="background-image: url('.(!empty($post->post_image) ? $post->post_image : asset('front_web/images/default.jpg')).')"';
                                                @endphp
                                                <div class="image previewImage w-125px h-125px" id="exampleInputImage" {!! $style !!}>
                                                </div>
                                                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                                      data-placement="top" data-bs-original-title="{{__('messages.common.change_image')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" name="sort_list_images[]" class="image-upload d-none" accept="image/*" />
                        </label>
                    </span>
                                            </div>
                                        </div>
                                    </div>


                                <div class="form-group mt-3">
                                    <input type="text" class="form-control form-control-solid"
                                           name="image_description[]"
                                           id="image_description"
                                           placeholder="{{__('messages.post.image_description') }}"
                                           maxlength="300">
                                </div>
                            </div>
                            <div class="col-md-9 add-post-text-editor mt-md-0 mt-4">
                                <button type="button"
                                        class=" btn btn-primary mb-2 btn-add-image">
                                    {{__('messages.post.add_image') }}
                                </button>
                                <textarea id="kt_docs_tinymce_plugins"
                                          name="sort_list_content[]"
                                          class="tox-target text-sort_list-description blog-editor-posts"
                                          height="200px">


                                        </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sort_list-item-container">
            <span class="item-number"></span>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <button type="button" id="addSortListItem"
                        class="btn btn-md btn-success text-white btn-add-post-item">{{__('messages.post.add_new_item') }}
                </button>
            </div>
        </div>
        </div>
        @endif
        @endif

