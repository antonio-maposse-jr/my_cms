<div id="AddSubCategoryModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{ __('messages.sub_category.add') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'addNewSubCategories']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="diagnosisCatErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name',__('messages.common.name').' :', ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control','required','id'=>'subCatName', 'placeholder'=>__('messages.common.name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('slug',__('messages.common.slug').' :', ['class' => 'form-label required']) }}
                        {{ Form::text('slug',null, ['class' => 'form-control','disabled','id'=>'subCatSlug','placeholder'=>__('messages.common.slug')]) }}
                        <input type="hidden" name="slug" id="subCatSlugHide">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('parent_category_id',__('messages.sub_category.select_cat').' :', ['class' => 'form-label required']) }}
                        {{ Form::select('parent_category_id', $category, null, ['class' => 'form-select', 'id' => 'categoryId', 'placeholder' => __('messages.sub_category.select_cat'), 'data-control' => 'select2','required']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('language',__('messages.sub_category.add_lan').' :', ['class' => 'form-label required']) }}
                        {{ Form::select('lang_id', getLanguage(), null, ['class' => 'form-select', 'id' => 'subCatLanguageId', 'placeholder' => __('messages.common.select_language'), 'data-control' => 'select2','required']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-2">
                        {{ Form::label('show_in_menu',__('messages.sub_category.show_menu').' :', ['class' => 'form-label']) }}
                        <div class="form-check form-switch form-check-custom form-check-solid justify-content-start">
                            <input class="form-check-input cursor-pointer is-active" name="show_in_menu" type="checkbox" value="1" checked>
                        </div>
                    </div>
                    <div class="d-flex pt-0 justify-content-end">
                        {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'subCateBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>



