'use strict';

document.addEventListener('turbo:load', loadCommentData)

function loadCommentData() {
    let comments = 'comment'
    listen('click', '.comment-delete-btn', function (event) {
        let deleteCommentId = $(event.currentTarget).data('id');
        deleteItem(route('post-comments.destroy', deleteCommentId),  Lang.get('messages.comment.comment'));
    });

};

$(document).on('change', '.set-comment-btn', function (e) {
    let role = $('#loginUserRole').val()
    const status = ($(this).prop('checked')) ? 0 : 1;
    let url
    if(role){
        url = route('customer.comment-status', status)
    }else{
        url = route('admin.comment-status',status)
    }
    $.ajax({
        url: url,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
            }
        }
    });
});

