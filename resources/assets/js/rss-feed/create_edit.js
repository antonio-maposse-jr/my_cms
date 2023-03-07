'use strict'

document.addEventListener('turbo:load', loadRssFeedCreateEditData)

let rssFeedCategoryId = ''
let rssFeedSubcategoryId = ''
let rssFeedLanguageId = ''
let isEdit = false

function loadRssFeedCreateEditData () {
    isEdit = $('#rssFeedIsEdit').val();
    rssFeedCategoryId =$('#EditRssFeedCategoryId').val();
    rssFeedSubcategoryId = $('#EditRssFeedSubcategoryId').val();
    rssFeedLanguageId = $('#EditRssFeedLanguageId').val();

    $('#rssFeedLanguageId').val(rssFeedLanguageId).trigger('change');
}

listen('change', '#rssFeedLanguageId', function () {
    let lang_id = $(this).val()
    $.ajax({
        url: route('posts.language'),
        type: 'POST',
        data: { data: lang_id },
        success: function (response) {
            $('#rssFeedCategoryId').empty()
            $('#rssFeedCategoryId').
                append(
                    $('<option value=""></option>').
                        text(Lang.get('messages.common.select_category')))
            $.each(response.data, function (i, v) {
                $('#rssFeedCategoryId').
                    append($('<option></option>').attr('value', v).text(i))
            })
            if(isEdit) {
                $('#rssFeedCategoryId').val(rssFeedCategoryId).trigger('change')
            }
        },
    })
})
listen('change', '#rssFeedCategoryId', function () {
    $.ajax({
        url: route('posts.category'),
        type: 'POST',
        data: {
            cat_id: $(this).val(),
            lang_id: $('#rssFeedLanguageId').val(),
        },
        success: function (response) {
            $('#rssFeedSubCategoryId').empty()
            $('#rssFeedSubCategoryId').
                append(
                    $('<option value=""></option>').
                        text(Lang.get('messages.common.select_subcategory')))
            $.each(response.data, function (i, v) {
                $('#rssFeedSubCategoryId').
                    append($('<option></option>').attr('value', v).text(i))
            })

            if(isEdit) {
                $('#rssFeedSubCategoryId').val(rssFeedSubcategoryId).trigger('change')
            }
        },
    })
})
listen('click', '.rss-feed-manually-update', function () {
    let id = $(this).data('id')
    var loadingButton = $(this).text('processing...');
    console.log(loadingButton)
    $.ajax({
        url: route('rss-feed.manuallyUpdate',id),
        type: 'POST',
        success: function (response) {
            window.livewire.emit('refresh');    
            displaySuccessMessage(response.message)
        }
    })
})
listen('click','.rss-feed-delete-btn',function (event){
    let recordId = $(event.currentTarget).data('id');
    deleteItem(route('rss-feed.destroy', recordId), Lang.get('messages.rss-feed'));
})
