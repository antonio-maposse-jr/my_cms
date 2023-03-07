

document.addEventListener('turbo:load', loadPageData);

function loadPageData() {

    let pageTableName = $('#pageTable');

    if ($('.visibility').length) {
        
    }
}

listen('click', '.delete-page-btn', function (event) {
    let deletePagetId = $(event.currentTarget).data('id');
    deleteItem(route('pages.destroy', deletePagetId), Lang.get('messages.page.page'));
})

listen('change', '.visibility', function (event) {
    let visibilityID = $(event.currentTarget).data('id');
    updateVisibility(visibilityID)
})

window.updateVisibility = function (id) {

    $.ajax({
        url: route('page.visibility'),
        method: 'POST',
        data: {data:id},
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                window.livewire.emit('refresh');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            window.livewire.emit('refresh');
        },
    });
};
