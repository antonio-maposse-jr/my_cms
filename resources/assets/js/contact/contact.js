document.addEventListener('turbo:load', loadContactData);

function loadContactData() {

    listen('click', '.delete-contact-btn', function (event) {
        let deletePagetId = $(event.currentTarget).data('id');
        deleteItem(route('Contacts.destroy', deletePagetId),
            Lang.get('messages.common.contact'));
    })
    listen('click', '.view-contact-btn', function (event) {
        let contactId = $(event.currentTarget).data('id');
        viewContactData(contactId);
    })
    function viewContactData(id){
        let contactsUrl = route('contacts.show', id)
        $.ajax({
            url: contactsUrl,
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#contactsEmail').text(result.data.email)
                    $('#contactsMessage').text(result.data.message)
                    $('#contactsName').text(result.data.name)
                    $('#contactsPhone').text(result.data.phone)
                    $('#showContactsModal').modal('show')
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message)
            },
        })
    }
}
   

