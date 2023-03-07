<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\PostVideo
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $video_content
 * @property string|null $thumbnail_image_url
 * @property string|null $video_url
 * @property string|null $video_embed_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $uploaded_thumb
 * @property-read array|string $uploaded_video
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Post $postVideo
 *
 * @method static Builder|PostVideo newModelQuery()
 * @method static Builder|PostVideo newQuery()
 * @method static Builder|PostVideo query()
 * @method static Builder|PostVideo whereCreatedAt($value)
 * @method static Builder|PostVideo whereId($value)
 * @method static Builder|PostVideo wherePostId($value)
 * @method static Builder|PostVideo whereThumbnailImageUrl($value)
 * @method static Builder|PostVideo whereUpdatedAt($value)
 * @method static Builder|PostVideo whereVideoContent($value)
 * @method static Builder|PostVideo whereVideoEmbedCode($value)
 * @method static Builder|PostVideo whereVideoUrl($value)
 * @mixin Eloquent
 */
class PostVideo extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'video_post';

    protected $fillable = ['post_id', 'video_content', 'thumbnail_image_url', 'video_url', 'video_embed_code'];

    const THUMBNAIL_PATH = 'post_video_thumb';

    const VIDEO_PATH = 'post_video';

    protected $casts = [
        'thumbnail_image_url' => 'string',
        'video_url' => 'string',
        'video_embed_code' => 'string',
    ];

    public static $rules = [
        'video_content' => 'nullable',
        'thumbnail_image_url' => 'nullable',
        'video_url' => 'nullable',
        'thumbnailImage' => 'nullable|mimes:jpeg,png,jpg,webp,svg',
        'uploadVideo' => 'nullable|mimes:mp4,mov,mkv,webm,avi|max:150000',
    ];

    /**
     * @return array|string
     */
    public function getUploadedVideoAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::VIDEO_PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return null;
    }

    /**
     * @return array|string
     */
    public function getUploadedThumbAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::THUMBNAIL_PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_web/images/default.jpg');
    }

    public function postVideo(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
