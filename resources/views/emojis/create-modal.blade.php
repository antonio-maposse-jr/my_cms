<div id="createEmojiModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{__('Add Emoji')}}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'createEmojiForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="createEmojiValidationErrorsBox"></div>
                <div class="mb-5">
                    <label for="loadEmoji" class="required">Emoji</label>
                    <input id="loadEmoji" class="form-control" name="emoji">
                </div>
                <div class="mb-5">
                    {{ Form::label('emojiName', __('Name').':', ['class' => 'required form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'emojiName', 'placeholder' =>  __('Name')]) }}
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
