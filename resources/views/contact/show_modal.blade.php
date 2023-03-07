<div id="showContactsModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="categoriesExampleModalLabel">{{ __('messages.common.show_contact') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="col-sm-12 mb-5">
                    <label class="form-label fs-6 fw-bolder text-gray-700">
                        {{__('messages.common.name').':'}}
                    </label>
                    <p id="contactsName" class="text-gray-600 fw-bold mb-0"></p>
                </div>
                <div class="col-sm-12 mb-5">
                    <label class="form-label fs-6 fw-bolder text-gray-700">
                        {{__('messages.emails.email').':'}}
                    </label>
                    <p id="contactsEmail" class="text-gray-600 fw-bold mb-0"></p>
                </div> 
                <div class="col-sm-12 mb-5">
                    <label class="form-label fs-6 fw-bolder text-gray-700">
                        {{__('messages.emails.phone').':'}}
                    </label>
                    <p id="contactsPhone" class="text-gray-600 fw-bold mb-0"></p>
                </div>
                <div class="col-sm-12 mb-5">
                    <label class="form-label fs-6 fw-bolder text-gray-700">
                        {{__('messages.emails.message').':'}}
                    </label>
                    <p id="contactsMessage" class="text-gray-600 fw-bold mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</div>
