<div id="editAlbumModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{__('messages.album.edit_album')}}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'editAlbumForm']) }}
            {{ Form::hidden('id',null,['id' => 'albumID']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editAlbumValidationErrorsBox"></div>
                <div class="mb-5">
                    {{ Form::label('name', __('messages.common.name').':', ['class' => 'required form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' =>  __('messages.common.name'),'id'=>'editName','required']) }}
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div>
                    {{ Form::label('name',__('messages.common.language').' :', ['class' => 'form-label required']) }}
                    {{ Form::select('lang_id', $languages, null, ['class' => 'form-select','id' => 'editAlbumLanguage','required','data-control'=>"select2", 'placeholder' => __('messages.common.select_language' )]) }}
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary m-0','id' => 'btnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-secondary my-0 ms-5 me-0','data-bs-dismiss'=>'modal']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

