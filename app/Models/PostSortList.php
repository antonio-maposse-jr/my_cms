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
 * App\Models\PostSortList
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $sort_list_title
 * @property string|null $image_description
 * @property string|null $sort_list_content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $post_sort_list_image
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|Post[] $postSortLists
 * @property-read int|null $post_sort_lists_count
 *
 * @method static Builder|PostSortList newModelQuery()
 * @method static Builder|PostSortList newQuery()
 * @method static Builder|PostSortList query()
 * @method static Builder|PostSortList whereCreatedAt($value)
 * @method static Builder|PostSortList whereId($value)
 * @method static Builder|PostSortList whereImageDescription($value)
 * @method static Builder|PostSortList wherePostId($value)
 * @method static Builder|PostSortList whereSortListContent($value)
 * @method static Builder|PostSortList whereSortListTitle($value)
 * @method static Builder|PostSortList whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PostSortList extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'sort_list_post';

    protected $fillable = ['post_id', 'sort_list_title', 'image_description', 'sort_list_content'];

    const IMAGES = 'post_sort_list_images';

    protected $appends = ['post_sort_list_image'];

    /**
     * @var string[]
     */
    public static $rules = [
        'sort_list_title.*' => 'nullable|max:190',
    ];

    protected $casts = [
        'sort_list_title' => 'string',
    ];

    /**
     * @return array|string
     */
    public function getPostSortListImageAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::IMAGES)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_web/images/default.jpg');
    }

    public function postSortLists(): HasMany
    {
        return $this->hasMany(Post::class, 'post_id');
    }
}
