// document.addEventListener('turbo:load', loadPostReactionData)

listenClick('.emoji-id', function (event) {
    let emojiId = $(event.currentTarget).data('emoji')
    let postId = $(event.currentTarget).data('post')
    $('.emoji-id').prop('disabled', true)
    $.ajax({
        url: route('post-reaction'),
        type: 'post',
        data: { emojiId: emojiId, postId: postId },
        success: function (data) {
            if (data.success) {
                $('.post-reaction-count').html(0)
                $.each(data.data, function(index) {
                    $('.post-reaction-count').closest("#"+index+"").html((data.data[index] != null) ? data.data[index].length : 0)
                });
                $('.emoji-id').prop('disabled', false)
            }
        },
    })
})

