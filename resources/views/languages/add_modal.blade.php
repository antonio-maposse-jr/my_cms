<div id="addLanguageModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.language.new_language') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'addLanguageForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none hide d-none" id="languageValidationErrorsBox"></div>
                    <div class="mb-5">
                        {{ Form::label('name',__('messages.language.language').(':'), ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control','required','id'=>'languages','placeholder' => __('messages.language.language')] ) }}
                    </div>
                    <div>
                        {{ Form::label('iso_code',__('messages.language.iso_code').(':'),['class' => 'form-label']) }}
                        {{ Form::text('iso_code', '', ['class' => 'form-control', 'id' => 'languageIsoCode','placeholder' => __('messages.language.iso_code')]) }}
                    </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary m-0','id' => 'languageBtnSave']) }}
                {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-secondary my-0 ms-5 me-0','id'=>"languageBtnCancel",'data-bs-dismiss'=>'modal']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
