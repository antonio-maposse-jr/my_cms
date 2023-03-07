<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\PostGallery
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $gallery_title
 * @property string|null $image_description
 * @property string|null $gallery_content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $post_gallery_image
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|Post[] $postGalleries
 * @property-read int|null $post_galleries_count
 *
 * @method static Builder|PostGallery newModelQuery()
 * @method static Builder|PostGallery newQuery()
 * @method static Builder|PostGallery query()
 * @method static Builder|PostGallery whereCreatedAt($value)
 * @method static Builder|PostGallery whereGalleryContent($value)
 * @method static Builder|PostGallery whereGalleryTitle($value)
 * @method static Builder|PostGallery whereId($value)
 * @method static Builder|PostGallery whereImageDescription($value)
 * @method static Builder|PostGallery wherePostId($value)
 * @method static Builder|PostGallery whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PostGallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'gallery_post';

    protected $fillable = ['post_id', 'gallery_title', 'image_description', 'gallery_content'];

    const IMAGES = 'post_gallery_images';

    protected $appends = ['post_gallery_image'];

    /**
     * @var string[]
     */
    public static $rules = [
        'gallery_title.*' => 'nullable|max:190',
    ];

    protected $casts = [
        'gallery_title' => 'string',
    ];

    /**
     * @return array|string
     */
    public function getPostGalleryImageAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::IMAGES)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_web/images/default.jpg');
    }

    public function postGalleries(): HasMany
    {
        return $this->hasMany(Post::class, 'post_id');
    }
}
