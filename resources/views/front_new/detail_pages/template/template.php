<script id="commentViewTemplate" type="text/jsrender">
<div class="media d-flex card-view-{{:id}} mt-2">
    <div class="media-img me-4 rounded-10">
        <img src="{{:image}}" alt="comment-image" class="w-100 h-100 rounded-10">
    </div>
    <div class="media-body comment-content w-100">
        <div class="media-title d-flex flex-wrap justify-content-between">
            <h5 class="mt-0 text-black fs-16 mb-1 user-name">{{:name}}</h5>
            <button class="delete-btn fs-14 text-danger delete-comment-btn" data-id="{{:id}}"><i class="fa fa-trash-can"></i> Delete</button>
        </div>
        <span class="text-gray fs-14 reply-time">{{:time}}</span>
        <p class="fs-14 text-gray mt-1 comment-msg">
            {{:comment}}
        </p>
    </div>
</div>
</script>
