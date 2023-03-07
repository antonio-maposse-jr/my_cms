<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereKey($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereValue($value)
 * @mixin Eloquent
 *
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 */
class Setting extends Authenticatable implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'settings';

    protected $with = ['media'];

    protected $appends = ['logo', 'favicon'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'key' => 'string',
        'value' => 'string',
    ];

    const Yes = 1;

    const No = 0;

    const LOGO = 'logo';

    const FAVICON = 'favicon';

    const IMAGE = 'image';

    const  EVERY_3_HOURS = 1;

    const TWICE_A_DAY = 2;

    const EVERY_DAY = 3;

    const WEEKLY = 4;

    const AUTO_UPDATE_RSS_FEED = [
        self::EVERY_3_HOURS => 'Every 3 Hours',
        self::TWICE_A_DAY => 'Twice a Day',
        self::EVERY_DAY => 'Every Day',
        self::WEEKLY => 'Weekly',
    ];

    const AUTO_UPDATE_RSS_FEED_FUNCTION = [
        self::EVERY_3_HOURS => 'everyThreeHours()',
        self::TWICE_A_DAY => 'twiceDaily()',
        self::EVERY_DAY => 'daily()',
        self::WEEKLY => 'weekly()',
    ];

    /**
     * @return string
     */
    public function getLogoAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::LOGO)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/image/infyom-logo.png');
    }

    /**
     * @return string
     */
    public function getFaviconAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::FAVICON)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/image/favicon-infyom.png');
    }
}
