<div class=" form-switch comment-approval-btn mt-2 ms-auto">
    <label class='form-label fw-bolder comment-toggle-status'>{{__('messages.comment.approval_pending')}}</label>&nbsp;
            <input class="form-check-input is-active set-comment-btn mx-0" name="status" type="checkbox"
                 value="{{getSettingValue()['comment_approved']}}" {{(getSettingValue()['comment_approved'] == 1) ? 'checked' : ''}} >&nbsp;
    <label class='form-label fw-bolder'>{{__('messages.comment.auto-approved')}}</label>
</div>
