'use strict'

document.addEventListener('turbo:load', UserData)

function UserData () {
    listen('click', '#changePassword', function () {
        $('#changePasswordModal').modal('show').appendTo('body')
    })

    window.printErrorMessage = function (selector, errorResult) {
        $(selector).show().html('')
        $(selector).text(errorResult.responseJSON.message)
    }

    listen('hidden.bs.modal', '#changePasswordModal', function () {
        resetModalForm('#changePasswordForm')
        $('.bg-active-success').removeClass('active')

    })
}

listen('click', '#passwordChangeBtn', function () {
    $.ajax({
        url: changePasswordUrl,
        type: 'PUT',
        data: $('#changePasswordForm').serialize(),
        success: function (result) {
            $('#changePasswordModal').modal('hide')
            displaySuccessMessage(result.message)
        },
        error: function error (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})
