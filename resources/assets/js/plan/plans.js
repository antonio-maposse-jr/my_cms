document.addEventListener('turbo:load', loadPlanData)

function loadPlanData () {

}

listen('click', '.plan-delete-btn', function (event) {
    let deletePlanId = $(event.currentTarget).data('id')
    deleteItem(route('plans.destroy', deletePlanId), 'Plan')
})

listen('change', '.is_default', function (event) {
    let planId = $(event.currentTarget).data('id')
    $.ajax({
        type: 'PUT',
        url: route('plan.make-default', planId),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                Livewire.emit('refresh')
            }
        },
    })
})
