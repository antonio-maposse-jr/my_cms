document.addEventListener('turbo:load', loadBulkPostData);

function loadBulkPostData(){
    
}
listen('click','#categoryIdsList',function (){
    $.ajax({
        url: route('bulk-post-ids-list'),
        type: 'GET',
        success: function (result) {
            $('#IdsModalData').html(result.data)
            $('#addIdsModalData').modal('show')
        }
    })
})
listen('click','#documentation',function (){
    $.ajax({
        url: route('bulk-post-documentation'),
        type: 'GET',
        success: function (result) {
            $('#IdsModalData').html(result.data)
            $('#addIdsModalData').modal('show')
        }
    })
})
