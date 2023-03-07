<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\SeoTool
 *
 * @property int $id
 * @property int $lang_id
 * @property string $site_title
 * @property string $home_title
 * @property string $site_description
 * @property string $keyword
 * @property string $google_analytics
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|SeoTool newModelQuery()
 * @method static Builder|SeoTool newQuery()
 * @method static Builder|SeoTool query()
 * @method static Builder|SeoTool whereCreatedAt($value)
 * @method static Builder|SeoTool whereGoogleAnalytics($value)
 * @method static Builder|SeoTool whereHomeTitle($value)
 * @method static Builder|SeoTool whereId($value)
 * @method static Builder|SeoTool whereKeyword($value)
 * @method static Builder|SeoTool whereLangId($value)
 * @method static Builder|SeoTool whereSiteDescription($value)
 * @method static Builder|SeoTool whereSiteTitle($value)
 * @method static Builder|SeoTool whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SeoTool extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_id',
        'site_title',
        'home_title',
        'site_description',
        'keyword',
        'google_analytics',
    ];

    protected $casts = [
        'lang_id' => 'integer',
        'site_title' => 'string',
        'home_title' => 'string',
    ];

    public static $rules = [
        'lang_id' => 'required',
        'site_title' => 'required|max:190',
        'home_title' => 'required|max:190',
        'site_description' => 'required',
        'keyword' => 'required',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }
}
