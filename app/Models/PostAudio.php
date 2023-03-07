<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostAudio extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'audio_post';

    protected $fillable = [
        'post_id',
        'audio_content',
    ];

    protected $casts = [
        'post_id' => 'integer',
        'audio_content' => 'string',
    ];

    public static $rules = [
        'audio_content' => 'nullable',
        'audios.*' => 'nullable|mimes:mp3,M4A,wav,aac,wma|max:50000',
    ];

    const AUDIOS_POST = 'post_audios';

    protected $appends = ['post_audio'];

    public function getPostAudioAttribute()
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::AUDIOS_POST);
        $mediaUrl = [];
        foreach ($medias as $media) {
            if (! empty($media)) {
                $mediaUrl[] = $media->getFullUrl();
            }
        }

        return $mediaUrl;
    }
}
