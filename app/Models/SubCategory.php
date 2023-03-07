<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\SubCategory
 *
 * @property int $id
 * @property string $name
 * @property string $show_in_menu
 * @property int $parent_category_id
 * @property int $lang_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|SubCategory newModelQuery()
 * @method static Builder|SubCategory newQuery()
 * @method static Builder|SubCategory query()
 * @method static Builder|SubCategory whereCreatedAt($value)
 * @method static Builder|SubCategory whereId($value)
 * @method static Builder|SubCategory whereLangId($value)
 * @method static Builder|SubCategory whereName($value)
 * @method static Builder|SubCategory whereParentCategoryId($value)
 * @method static Builder|SubCategory whereShowInMenu($value)
 * @method static Builder|SubCategory whereUpdatedAt($value)
 * @mixin Eloquent
 *
 * @property-read Category $category
 * @property-read Language $language
 * @property-read Navigation|null $navigation
 */
class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = ['name', 'lang_id', 'parent_category_id', 'show_in_menu', 'slug'];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'lang_id' => 'integer',
        'parent_category_id' => 'integer',
        'show_in_menu' => 'string',
    ];

    const SHOW_MENU_ACTIVE = 1;

    const SHOW_MENU_DEACTIVE = 0;

    const SHOW_MENU = [
        self::SHOW_MENU_ACTIVE => 'Active',
        self::SHOW_MENU_DEACTIVE => 'Deactive',
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
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
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
    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'sub_category_id', 'id');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        'name' => 'required|max:190',
        'slug' => 'required|unique:sub_categories,slug',
        'lang_id' => 'required',
        'parent_category_id' => 'required',
    ];
}
