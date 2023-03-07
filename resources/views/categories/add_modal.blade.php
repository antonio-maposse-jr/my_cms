<div id="addCategoriesModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="categoriesExampleModalLabel">{{ __('messages.category.add_category') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'addNewCategories']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="diagnosisCatErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.common.name').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('name', null, ['id'=>'categoriesName','class' => 'form-control','required','placeholder'=>__('messages.common.name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('slug',__('messages.category.slug').' :', ['class' => 'form-label']) }}
                        {{ Form::text('slug',null, ['class' => 'form-control','disabled','id'=>'categoriesSlug','placeholder'=>__('messages.category.slug')]) }}
                        <input type="hidden" name="slug" id="slugHide">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name',__('messages.common.language').' :', ['class' => 'form-label required']) }}
                        {{ Form::select('lang_id', $language, null, ['class' => 'form-select', 'id' => 'categoriesLanguageId', 'placeholder' => __('messages.common.select_language'), 'data-control' => 'select2','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('show_in_menu',__('messages.category.show_menu').' :', ['class' => 'form-label']) }}
                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
                            <input class="form-check-input cursor-pointer is-active" name="show_in_menu" type="checkbox" value="1" checked>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('show_in_home_page',__('messages.category.show_home').' :', ['class' => 'form-label']) }}
                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
                            <input class="form-check-input cursor-pointer is-active" name="show_in_home_page" type="checkbox" value="1" checked>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'categoriesBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>




