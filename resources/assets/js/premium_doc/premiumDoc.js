document.addEventListener('turbo:load', loadPlanData)

function loadPlanData () {

}

listen('click', '.premium_doc-delete-btn', function (event) {
    let deleteDocId = $(event.currentTarget).data('id')
    deleteItem(route('premium-documents.destroy', deleteDocId), 'Document')
})

