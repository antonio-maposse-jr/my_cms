document.addEventListener('turbo:load', loadStaffData);

function loadStaffData() {

    let staffTableName = $('#staffTable');
        listen('click', '.delete-staff-btn', function (event) {
            let deleteStaffId = $(event.currentTarget).data('id');
            deleteItem(route('staff.destroy', deleteStaffId), Lang.get('messages.staff.staff'));
        })
}
listen('click','.resend-email-staff-btn',function (event){
    let staffId = $(event.currentTarget).data('id');
    $.ajax({
        url: route('resend-email',staffId),
        type: 'GET',
        success: function (result) {
            displaySuccessMessage(result.message);
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

