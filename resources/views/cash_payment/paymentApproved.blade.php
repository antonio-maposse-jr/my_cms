<div id="subscriptionPlanApprovedModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"
                    id="exampleModalLabel">{{ __('messages.subscription.change_payment_status') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'changePaymentStatus']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="diagnosisCatErrorsBox"></div>
                <div class="row">
                    <div>

                        {{ Form::hidden('id',null,['id' => 'PaymentID']) }}
                        {{ Form::hidden('status',null,['id' => 'paymentStatus']) }}
                        {{ Form::textarea('notes', null, ['class' => 'form-control','required','id'=>'PaymentNotes', 'rows' => 5 ,'cols'=>25]) }}
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0 float-end">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'PaymentBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
