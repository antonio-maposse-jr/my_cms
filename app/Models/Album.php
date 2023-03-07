<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Album
 *
 * @property int $id
 * @property int $lang_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Language $language
 *
 * @method static Builder|Album newModelQuery()
 * @method static Builder|Album newQuery()
 * @method static Builder|Album query()
 * @method static Builder|Album whereCreatedAt($value)
 * @method static Builder|Album whereId($value)
 * @method static Builder|Album whereLangId($value)
 * @method static Builder|Album whereName($value)
 * @method static Builder|Album whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $fillable = ['name', 'lang_id'];

    protected $casts = [
        'name' => 'string',
        'lang_id' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }

    public function AlbumCategory()
    {
        return $this->hasMany(AlbumCategory::class, 'album_id');
    }
}
