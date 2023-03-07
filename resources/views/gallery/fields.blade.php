<div class="row">
    <div class="mb-5 col-lg-12">
        {{ Form::label('language',__('messages.gallery.language').' :', ['class' => 'form-label required mb-3']) }}
        {{ Form::select('lang_id', getLanguage(), isset($gallery) ? $gallery->lang_id :null, ['class' => 'form-select', 'id' => 'galleryLangId', 'placeholder' => __('messages.common.select_language'), 'data-control' => 'select2','required']) }}
    </div>
    <div class="mb-5 col-lg-12">
        {{ Form::label('album',__('messages.gallery.album').' :', ['class' => 'form-label required mb-3']) }}
        {{ Form::select('album_id',[],null,['class' => 'form-select', 'id' => 'galleryAlbumId', 'placeholder' => __('messages.gallery.select_album'), 'data-control' => 'select2','required']) }}
    </div>
    <div class="mb-5 col-lg-12">
        {{ Form::label('category',__('messages.gallery.category').' :', ['class' => 'form-label required mb-3']) }}
        {{ Form::select('category_id', [],null,['class' => 'form-select', 'id' => 'galleryCategoryId', 'placeholder' =>__('messages.common.select_category'), 'data-control' => 'select2','required']) }}
    </div>
    <div class="mb-5 col-lg-12">
        {{ Form::label('title',__('messages.gallery.title').' :', ['class' => 'form-label required mb-3']) }}
        {{ Form::text('title',isset($gallery) ? $gallery->title :null, ['class' => 'form-control', 'id' => 'galleryTitleId', 'placeholder' =>__('messages.gallery.title'),'required']) }}
    </div>
    <div class="mb-5 col-lg-12">
        {{ Form::label('image',__('messages.gallery.image').' :', ['class' => 'form-label required mb-3'])}}
        <input type="file" class="form-control" id="galleryNewImage" name="images[]" multiple="multiple"
               accept=".png, .jpg, .jpeg" {{isset($gallery) ? null : 'required' }}>
    </div>
    <div class="mb-5 col-lg-12">
        <div id="preview" class="additional-images">
            @if(isset($gallery->gallery_image))
                @foreach($gallery->gallery_image as $image)
                    <img src="{{ $image }}" width="100px" height="60px" class="border-color">
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-lg-12 d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{ route('gallery-images.index') }}" type="reset"
           class="btn btn-secondary my-0  me-0">{{__('messages.common.discard')}}</a>
    </div>
</div>

