'use strict'

document.addEventListener('turbo:load', loadEmojiData)

function loadEmojiData () {

    $('#loadEmoji').emojioneArea({
        pickerPosition: "bottom",
    })
}

listen('click', '#addEmoji', function () {
    $('#createEmojiModal').modal('show').appendTo('body')
})

listen('hidden.bs.modal', '#createEmojiModal', function () {
    resetModalForm('#createEmojiForm')
})

listen('submit', '#createEmojiForm', function (e) {
    console.log('form submitted')
    e.preventDefault()
    $.ajax({
        url: route('emoji.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#createEmojiModal').modal('hide')
                window.livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('click', '.delete-emoji-btn', function (event) {
    let deleteEmojiId = $(event.currentTarget).data('id')
    deleteItem(route('emoji.destroy', deleteEmojiId), 'Emoji')
})

listenChange('.emoji-active', function (e){
    e.preventDefault()
    let id = $(this).attr('data-id')
    console.log(id)
    $.ajax({
        url: 'emoji-status/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                window.livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            window.livewire.emit('refresh')
        },
    })
})
