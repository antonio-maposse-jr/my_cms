<div class="row gx-10 mb-5">
    <div class="col-lg-12 row">
        <div class="mb-5 col-lg-6">
            {{ Form::label('name',__('messages.page.name').' :', ['class' => 'form-label required']) }}
            {{ Form::text('name', isset($page) ? $page->name : null, ['class' => 'form-control form-control-solid','required','placeholder' => __('messages.page.name')]) }}
        </div>
        <div class="mb-5 col-lg-6">
            {{ Form::label('title',__('messages.page.title').' :', ['class' => 'form-label required']) }}
            {{ Form::text('title', isset($page) ? $page->title : null, ['class' => 'form-control form-control-solid','required','placeholder' =>__('messages.page.title'),'id'=>'pageTitlePage']) }}
        </div>
        <div class="mb-5 col-lg-12">
            {{ Form::label('slug',__('messages.page.slug').' :', ['class' => 'form-label required']) }}
            {{ Form::text('slug', isset($page) ? $page->slug : null, ['class' => 'form-control','required','disabled','placeholder' => __('messages.page.slug'), 'id'=>'pageSlug']) }}
            <input type="hidden" name="slug" id="pageSlugHidden"  value="{{ isset($page) ? $page->slug : null}}">
        </div>
        <div class="mb-5 col-lg-6">
            {{ Form::label('meta_title',__('messages.page.meta_title').' :', ['class' => 'form-label required']) }}
            {{ Form::text('meta_title', isset($page) ? $page->meta_title : null, ['class' => 'form-control','placeholder' => __('messages.page.meta_title'), 'required']) }}
        </div>
        <div class="mb-5 col-lg-6">
            {{ Form::label('meta_description',__('messages.page.meta_description').' :', ['class' => 'form-label required']) }}
            {{ Form::textarea('meta_description', isset($page) ? $page->meta_description : null, ['class' => 'form-control meta_description','placeholder' => __('messages.page.meta_description') ,'rows'=>'1', 'cols'=>'0', 'required']) }}
        </div>
        <div class="mb-5 col-lg-6">
            {{ Form::label('language',__('messages.page.add_lang').' :', ['class' => 'form-label required']) }}
            {{ Form::select('lang_id', getLanguage(), isset($page) ? $page->lang_id :null, ['class' => 'form-select form-select-solid', 'id' => 'pageLanguageId', 'placeholder' => __('messages.page.add_lang'), 'data-control' => 'select2','required']) }}
        </div>

        <div class="row mt-2">
            <div class="col-lg-2 mb-4">
                <label class="form-label required">{{__('messages.page.location')}}</label>
            </div>

            <div class="col-lg-2  mb-4">
                <input class="form-check-input" id="menu1" type="radio" name="location" value="2"
                       {{ !empty($page) && $page->location == 2 ? 'checked' : '' }}>
                <label for="menu1">{{__('messages.page.main_menu')}}</label>
            </div>

            <div class="col-lg-3 mb-4">
                <input class="form-check-input" id="menu2" type="radio" name="location" value="4"
                       {{ !empty($page) && $page->location == 4 ? 'checked' : '' }}>
                <label for="menu2">{{__('messages.page.dont_add_menu')}}</label>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-2 mb-4">
                <label class="form-label">{{__('messages.page.visibility')}}</label>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-5">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input w-30px h-20px is-active" {{ Request::is('admin/pages/create*') ?'checked' : '' }}  name="visibility" type="checkbox" value="1"  {{ !empty($page) && $page->visibility === 1 ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-2 mb-4">
                <label class="form-label mr-3">{{__('messages.page.show_breadcrumb')}}</label>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-5">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input w-30px h-20px is-active" name="show_breadcrumb" type="checkbox" value="1" {{ !empty($page) && $page->show_breadcrumb === 1 ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-2 mb-4">
                <label class="form-label mr-3">{{__('messages.page.show_right')}}</label>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-5">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input w-35px h-20px is-active" name="show_right_column" type="checkbox" value="1" {{ !empty($page) && $page->show_right_column === 1 ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-2 mb-4">
                <label class="form-labe mr-3">{{__('messages.page.show_title')}}</label>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-5">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input w-35px h-20px is-active" name="show_title" type="checkbox" value="1" {{ !empty($page) && $page->show_title === 1 ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-2 mb-4">
                <label class="form-label mr-3">{{__('messages.page.user_show')}}</label>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-5">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input w-30px h-20px is-active" name="permission" type="checkbox"
                               value="1" {{ !empty($page) && $page->permission === 1 ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="col-md-2 btn btn-primary mb-4 page-btn-add-image">
        {{__('messages.post.add_image')}}
    </button>
    <textarea id="kt_docs_tinymce_plugins" name="content" class="tox-target page-text-description-077 blog-editor-posts">
      {!! $page->content??null !!}
    </textarea>
    @include('page.template.template')
    <div class="d-flex mt-5">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{ route('pages.index') }}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>

    <div class="modal fade" id="pageFileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('messages.images')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" class="form-control" id="pageNewImage" name="image" accept=".png, .jpg, .jpeg">
                    <div class="row uploaded-img pt-10 custom-scroll">
                    </div>
                </div>
                <div class="modal-footer p-2 d-none justify-content-between">
                    <div>
                        <button type="button"
                                class="btn btn-danger  image-delete-btn-page">{{__('messages.delete')}}</button>
                    </div>
                    <button type="button"
                            class="btn btn-primary select-image">{{__('messages.post.select_image')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
