<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\AlbumCategory
 *
 * @property int $id
 * @property int $lang_id
 * @property int $album_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Album $album
 * @property-read Language $language
 *
 * @method static Builder|AlbumCategory newModelQuery()
 * @method static Builder|AlbumCategory newQuery()
 * @method static Builder|AlbumCategory query()
 * @method static Builder|AlbumCategory whereAlbumId($value)
 * @method static Builder|AlbumCategory whereCreatedAt($value)
 * @method static Builder|AlbumCategory whereId($value)
 * @method static Builder|AlbumCategory whereLangId($value)
 * @method static Builder|AlbumCategory whereName($value)
 * @method static Builder|AlbumCategory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class AlbumCategory extends Model
{
    use HasFactory;

    protected $table = 'album_categories';

    protected $fillable = [
        'name',
        'lang_id',
        'album_id',
    ];

    protected $casts = [
        'name' => 'string',
        'lang_id' => 'integer',
        'album_id' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    /**
     * @return BelongsTo
     */
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    /**
     * @return HasMany
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }
}
