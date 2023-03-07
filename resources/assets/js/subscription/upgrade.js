listenChange('#paymentType', function () {
    let paymentType = $(this).val()

    if (isEmpty(paymentType)) {
        $('.proceed-to-payment').addClass('d-none')
        $('.RazorPayPayment').addClass('d-none')
        $('.stripePayment').addClass('d-none')
        $('.manuallyPayAttachment').addClass('d-none')
    }
    if (paymentType == 1) {
        $('.proceed-to-payment').addClass('d-none')
        $('.RazorPayPayment').addClass('d-none')
        $('.stripePayment').removeClass('d-none')
        $('.manuallyPayAttachment').addClass('d-none')
    }
    if (paymentType == 2) {
        $('.proceed-to-payment').addClass('d-none')
        $('.paypalPayment').removeClass('d-none')
        $('.RazorPayPayment').addClass('d-none')
        $('.manuallyPayAttachment').addClass('d-none')
    }
    if (paymentType == 3) {
        $('.proceed-to-payment').addClass('d-none')
        $('.paypalPayment').addClass('d-none')
        $('.RazorPayPayment').addClass('d-none')
        $('.ManuallyPayment').removeClass('d-none')
        $('.manuallyPayAttachment').removeClass('d-none')
    }
})
listenClick('.makePayment', function () {
    let payloadData = {
        plan_id: $(this).data('id'),
        from_pricing: typeof fromPricing != 'undefined'
            ? fromPricing
            : null,
        price: $(this).data('plan-price'),
        payment_type: $('#paymentType option:selected').val(),
    }
    $(this).addClass('disabled')
    $('.makePayment').text('Please Wait...')
    $.post(route('purchase-subscription'), payloadData).done((result) => {
        if (typeof result.data == 'undefined') {
            displaySuccessMessage(result.message)
            setTimeout(function () {
                Turbo.visit(route('subscription.index'))
            }, 3000)
            return true
        }
        let sessionId = result.data.sessionId
        stripe.redirectToCheckout({
            sessionId: sessionId,
        }).then(function (result) {
            $(this).
                html(Lang.get('messages.subscription.purchase')).
                removeClass('disabled')
            $('.makePayment').attr('disabled', false)
            displaySuccessMessage(result.message)
        })
    }).catch(error => {
        $(this).
            html(Lang.get('messages.subscription.purchase')).
            removeClass('disabled')
        $('.makePayment').attr('disabled', false)
        displayErrorMessage(error.responseJSON.message)
    })
})
listenClick('.paymentByPaypal', function () {

    $('.paymentByPaypal').text('Please Wait...')
    let pricing = typeof fromPricing != 'undefined' ? fromPricing : null
    $(this).addClass('disabled')
    $.ajax({
        type: 'GET',
        url: route('paypal.init'),
        data: {
            'planId': $(this).data('id'),
            'from_pricing': pricing,
            'payment_type': $('#paymentType option:selected').val(),
        },
        success: function (result) {

            if (result.link) {
                window.location.href = result.link
            }

            if (result.statusCode === 201) {
                let redirectTo = ''

                $.each(result.result.links,
                    function (key, val) {
                        if (val.rel == 'approve') {
                            redirectTo = val.href
                        }
                    })
                location.href = redirectTo
            }
        },
        error: function (error) {
            displayErrorMessage(error.responseJSON.message)
            $('.paymentByPaypal').text('Pay / Switch Plan')
        },
        complete: function () {
        },
    })
})
listenSubmit('.manuallyPaymentForm', function (e) {
    e.preventDefault()
    $('.manuallyPay').text('Please Wait...')
    $(this).addClass('disabled')
    let planId = $('.manuallyPaymentPlanId').val()
    let formData = new FormData($('.manuallyPaymentForm')[0])
    $.ajax({
        type: 'POST',
        url: route('subscription.manual', planId),
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            displaySuccessMessage(result.message)
            setTimeout(function () {
                Turbo.visit(route('subscription.index'))
            }, 3000)
        },
        error: function (error) {
            displayErrorMessage(error.responseJSON.message)
        },
        complete: function () {
        },
    })

})
// listenClick('#subscriptionPlanStatus', function (event) {
//     let categoryId = $(event.currentTarget).data('id')
//
//     renderApprovedData(categoryId)
// })
//
// function renderApprovedData (id) {
//     $('#PaymentID').val(id)
//     $('#subscriptionPlanApprovedModal').modal('show')
// }

// listenClick('#rejectedPayment', function () {
//     let payment = $(this).data('id')
//     let Notes = $('#PaymentNotes').val()
//
//     $.ajax({
//         type: 'get',
//         url: route('subscription.status', payment),
//         data: { 'status': 'Rejected', 'Notes': Notes },
//         success: function (response) {
//             $('#subscriptionPlanApprovedModal').modal('hide')
//             displaySuccessMessage(response.message)
//             Livewire.emit('refresh')
//         },
//     })
// })

listenClick('.subscribed-user-plan-edit-btn', function (event) {
    let SubscriptionId = $(event.currentTarget).data('id')
    $('#editSubscriptionModal').modal('show')
    editSubscriptionRenderData(SubscriptionId)
})

function editSubscriptionRenderData (id) {
    let SubscriptionUrl = route('subscription.user.plan.edit', id)
    $.ajax({
        url: SubscriptionUrl,
        type: 'GET',
        data: {
            'id': id,
        },
        success: function (result) {
            if (result.success) {
                Livewire.emit('refresh', 'refresh')
                $('#SubscriptionId').val(result.data.id)
                $('#EndDate').val(result.data.ends_at)
            }

            $('#EndDate').flatpickr({
                minDate: result.data.ends_at,
                disableMobile: true,
                'locale': lang,
                dateFormat: 'Y-m-d',
            })

        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenSubmit('#editSubscriptionForm', function (event) {
    event.preventDefault()
    let subscriptionId = $('#SubscriptionId').val()
    let subscriptionUrl = route('subscription.user.plan.update',
        subscriptionId)
    $.ajax({
        url: subscriptionUrl,
        type: 'get',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editSubscriptionModal').modal('hide')
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

// listenClick('#approvedPayment', function () {
//     let payment = $(this).data('id')
//     let Notes = $('#PaymentNotes').val()
//
//     $.ajax({
//         type: 'get',
//         url: route('subscription.status', payment),
//         data: { 'status': 'Manually', 'Notes': Notes },
//         success: function (response) {
//             $('#subscriptionPlanApprovedModal').modal('hide')
//             displaySuccessMessage(response.message)
//             Livewire.emit('refresh')
//         },
//     })
// })

listenClick('#approvedPayment', function (event) {
    event.preventDefault()
    let categoryId = $(event.currentTarget).data('id')
    let status = 'Manually'
    renderApprovedData(categoryId, status)
})
listenClick('#rejectedPayment', function (event) {
    event.preventDefault()

    let categoryId = $(event.currentTarget).data('id')
    let status = 'Rejected'
    renderApprovedData(categoryId, status)
})

function renderApprovedData (id, status) {
    $('#PaymentID').val(id)
    $('#paymentStatus').val(status)
    $('#subscriptionPlanApprovedModal').modal('show')
}

listenSubmit('#changePaymentStatus', function (event) {
    event.preventDefault()
    $('#PaymentBtnSave').attr('disabled',true);
    let payment = $('#PaymentID').val()
    let subscriptionUrl = route('subscription.status', payment)
    $.ajax({
        url: subscriptionUrl,
        type: 'get',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#subscriptionPlanApprovedModal').modal('hide')
                $('#PaymentBtnSave').attr('disabled',false);
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})
listen('hidden.bs.modal', '#subscriptionPlanApprovedModal', function () {
    resetModalForm('#changePaymentStatus');
});
