<!-- start post Reaction -->
<div class="post-reaction-div">
    <div class="row">
        <div class="post-reaction">
            <h4 class="title-reactions mt-3 mb-3">What's Your Reaction ?</h4>
            @foreach($emojis as $emoji)
                <div class="emoji">
                    <div>
                        <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{$emoji->id}}" 
                              data-post="{{$postDetail->id}}"> {{ html_entity_decode($emoji->emoji) }}</span>
                            <label class="post-reaction-count  like-reaction" id="{{$emoji->id}}">{{isset($countEmoji[$emoji->id]) ? count($countEmoji[$emoji->id]) : 0}}</label>
                            <p class="fs-12 mb-0">{{ __('messages.reaction.'.$emoji->name) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end post Reaction -->
