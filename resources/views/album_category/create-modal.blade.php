<div id="createAlbumCategoryModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{__('messages.album_category.add_album_category')}}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'createAlbumCategoryForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="createAlbumCategoryValidationErrorsBox"></div>
                <div class="row">
                    <div class="mb-5">
                        {{ Form::label('name', __('messages.common.name').':', ['class' => 'required form-label']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' =>  __('messages.common.name'),'required']) }}
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="mb-5">
                        {{ Form::label('album_id', __('messages.gallery.album').':', ['class' => 'required form-label ']) }}
                        {{ Form::select('album_id', $albums, null, ['id' => 'selectAlbumCategory','data-dropdown-parent'=>'#createAlbumCategoryModal','class' => 'form-select', 'aria-label'=>"Select a Country",
                            'data-control'=>"select2", 'placeholder' => __('messages.album_category.select_album'),'required']) }}
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div>
                        <div>
                            {{ Form::label('name',__('messages.common.language').' :', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            {{ Form::select('lang_id', $languages, null, ['id' => 'selectAlbumCategoryLanguage','data-dropdown-parent'=>'#createAlbumCategoryModal','class' => 'form-select', 'aria-label'=>"Select a Country",
                                'data-control'=>"select2", 'placeholder' => __('messages.common.select_language'),'required']) }}
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary m-0','id' => 'btnSave']) }}
                {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-secondary my-0 ms-5 me-0','data-bs-dismiss'=>'modal']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
