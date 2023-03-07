<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $show_in_menu
 * @property string $show_in_home_page
 * @property string $color
 * @property int $lang_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Language $language
 * @property-read Navigation|null $navigation
 * @property-read Collection|Post[] $posts
 * @property-read int|null $posts_count
 * @property-read Collection|SubCategory[] $subCategories
 * @property-read int|null $sub_categories_count
 *
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereColor($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereLangId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereShowInHomePage($value)
 * @method static Builder|Category whereShowInMenu($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;

    const SHOW_IN_MENU_ACTIVE = 1;

    const SHOW_IN_MENU_DEACTIVE = 0;

    const SHOW_IN_HOME_ACTIVE = 1;

    const SHOW_IN_HOME_DEACTIVE = 0;

    protected $fillable = [
        'name',
        'lang_id',
        'show_in_menu',
        'show_in',
        'show_in_home_page',
        'slug',
        'color',
    ];

    protected $casts = [
        'name' => 'string',
        'lang_id' => 'integer',
        'show_in_menu' => 'string',
        'show_in_home_page' => 'string',
        'slug' => 'string',
        'color' => 'string',
    ];

    const SHOW_MENU_ACTIVE = 1;

    const SHOW_MENU_DEACTIVE = 0;

    const SHOW_MENU = [
        self::SHOW_MENU_ACTIVE => 'Active',
        self::SHOW_MENU_DEACTIVE => 'Deactive',
    ];

    const SHOW_MENU_HOME_ACTIVE = 1;

    const SHOW_MENU_HOME_DEACTIVE = 0;

    const SHOW_MENU_HOME = [
        self::SHOW_MENU_HOME_ACTIVE => 'Active',
        self::SHOW_MENU_HOME_DEACTIVE => 'Deactive',
    ];

    public static $rules = [
        'name' => 'required|max:190',
        'slug' => 'required|unique:categories,slug',
        'lang_id' => 'required',
    ];

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    /**
     * @return HasMany
     */
    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'parent_category_id', 'id');
    }

    /**
     * @return MorphOne
     */
    public function navigation(): MorphOne
    {
        return $this->morphOne(Navigation::class, 'navigationable');
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('lang_id', getFrontSelectLanguage());
    }
}
