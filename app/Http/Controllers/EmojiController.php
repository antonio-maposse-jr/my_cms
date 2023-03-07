<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmojiRequest;
use App\Models\Emoji;

class EmojiController extends AppBaseController
{ 
    public function index()
    {
        return view('emojis.index');
    }

    public function store(StoreEmojiRequest $request)
    {
        $input = $request->all();
        Emoji::create($input);

        return $this->sendSuccess('Emoji created successfully.');
    }

    /**
     * @param Emoji $emoji
     *
     * @return mixed
     */
    public function destroy(Emoji $emoji): mixed
    {
        $activeEmoji = Emoji::whereStatus(Emoji::ACTIVE);

        if ($emoji->status == Emoji::ACTIVE && $activeEmoji->count() <= 4) {
            return $this->sendError('You can\'t Delete than 4 emoji');
        }
        
        $emoji->delete();

        return $this->sendSuccess('Emoji deleted successfully.');
    }

    public function changeEmojiStatus($id)
    {
        $emoji = Emoji::findOrFail($id);
        $activeEmoji = Emoji::whereStatus(Emoji::ACTIVE);

        if ($emoji->status == Emoji::ACTIVE && $activeEmoji->count() <= 4) {
            return $this->sendError('You can\'t disable less than 4 emoji');
        }
        if ($emoji->status == Emoji::DISABLE && $activeEmoji->count() >= 7) {
            return $this->sendError('You can\'t active more than 7 emoji');
        }
        $updateStatus = !$emoji->status;
        $emoji->update(['status' => $updateStatus]);

        return $this->sendSuccess('Emoji Status Updated Successfully.');
    }
}
