<div id="editLanguageModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.language.edit_language') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'editLanguageForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none hide d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('languageId',null,['id'=>'languageId']) }}
                    <div class="mb-5">
                        {{ Form::label('name',__('messages.language.language').(':'), ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['id'=>'editLanguage','class' => 'form-control','required','placeholder' => __('messages.language.language')]) }}
                    </div>
                    <div>
                        {{ Form::label('iso_code',__('messages.language.iso_code').(':'),['class' => 'form-label required']) }}
                        {{ Form::text('iso_code', null, ['class' => 'form-control', 'id' => 'editIso','placeholder' => __('messages.language.iso_code')]) }}
                    </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary m-0','id' => 'btnEditSave']) }}
                {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-secondary my-0 ms-5 me-0','id="btnEditCancel"','data-bs-dismiss'=>'modal']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

