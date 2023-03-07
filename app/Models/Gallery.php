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
 * App\Models\Gallery
 *
 * @property int $id
 * @property int $lang_id
 * @property int $album_id
 * @property int $category_id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Album $album
 * @property-read AlbumCategory $category
 * @property-read array|string $gallery_image
 * @property-read Language $language
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 *
 * @method static Builder|Gallery newModelQuery()
 * @method static Builder|Gallery newQuery()
 * @method static Builder|Gallery query()
 * @method static Builder|Gallery whereAlbumId($value)
 * @method static Builder|Gallery whereCategoryId($value)
 * @method static Builder|Gallery whereCreatedAt($value)
 * @method static Builder|Gallery whereId($value)
 * @method static Builder|Gallery whereLangId($value)
 * @method static Builder|Gallery whereTitle($value)
 * @method static Builder|Gallery whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'galleries';

    protected $fillable = [
        'lang_id', 'album_id', 'category_id', 'title',
    ];

    protected $casts = [
        'lang_id' => 'integer',
        'album_id' => 'integer',
        'category_id' => 'integer',
        'title' => 'string',
    ];

    const GALLERY_IMAGE = 'gallery_images';

    protected $appends = ['gallery_image'];

    /**
     * @return array|string
     */
    public function getGalleryImageAttribute()
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::GALLERY_IMAGE);
        $images = [];
        if (! empty($medias)) {
            foreach ($medias as $key => $media) {
                $images[$key] = $media->getFullUrl();
            }

            return $images;
        }

        return asset('front_web/images/default.jpg');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(AlbumCategory::class, 'category_id');
    }
}
