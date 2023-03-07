<div id="editCategoriesModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{ __('messages.category.edit_category') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'editCategories']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="diagnosisCatErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <input type="hidden" id="editCategoryIdHidden">
                        {{ Form::label('name', __('messages.common.name').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('name', null, ['id'=>'editCategoriesName','class' => 'form-control','required','placeholder'=>__('messages.common.name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('slug',__('messages.category.slug').' :', ['class' => 'form-label']) }}
                        {{ Form::text('slug',null, ['class' => 'form-control','disabled','id'=>'editCategoriesSlug','placeholder'=>__('messages.category.slug')]) }}
                        <input type="hidden" name="slug" id="editCategoriesSlugHide">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name',__('messages.common.language').' :', ['class' => 'form-label required']) }}
                        {{ Form::select('lang_id', $language, null, ['class' => 'form-select', 'id' => 'CategoriesLanguageEditId', 'placeholder' => __('messages.common.select_language'), 'data-control' => 'select2','required']) }}
                        <p class="text-warning d-none category-warning">{{ __('messages.common.note') }} : {{ __('messages.category.category_language_warning') }}</p>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('show_in_menu',__('messages.category.show_menu').' :', ['class' => 'form-label']) }}
                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
                            <input class="form-check-input cursor-pointer is-active-menu" name="show_in_menu" type="checkbox" value="1" checked>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('show_in_home_page',__('messages.category.show_home').' :', ['class' => 'form-label']) }}
                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
                            <input class="form-check-input cursor-pointer is-active-home" name="show_in_home_page" type="checkbox" value="1" checked>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'CategoriesEditBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
