<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PostReactionEmoji;

class PostReaction extends Component
{
    public $postId;

//    protected $listeners = ['refresh' => '$refresh', 'resetPage'];
    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function emoji($postId, $emojiId)
    {
        $old = PostReactionEmoji::wherePostId($postId)->whereIpAddress(\Request::ip())->first();
//        if ($old == null) {
        PostReactionEmoji::create([
            'ip_address' => \Request::ip(),
            'emoji_id'   => $emojiId,
            'post_id'    => $postId,
        ]);
//        }
    }

    public function render()
    {
        $postId = $this->postId;
        $countEmoji = PostReactionEmoji::wherePostId($postId)->get()->groupBy('emoji_id');

        return view('livewire.post-reaction', compact('postId', 'countEmoji'));
    }
}
