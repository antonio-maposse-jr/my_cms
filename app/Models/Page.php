<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $meta_title
 * @property string $meta_description
 * @property int $parent_menu_link
 * @property int $lang_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property int $location
 * @property int $visibility
 * @property int $show_title
 * @property int $show_right_column
 * @property int $show_breadcrumb
 * @property int $permission
 * @property string|null $content
 * @property-read Language $language
 * @property-read Menu $parentMenu
 *
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static Builder|Page query()
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereLangId($value)
 * @method static Builder|Page whereMetaDescription($value)
 * @method static Builder|Page whereMetaTitle($value)
 * @method static Builder|Page whereParentMenuLink($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereTitle($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static Builder|Page whereContent($value)
 * @method static Builder|Page whereLocation($value)
 * @method static Builder|Page whereName($value)
 * @method static Builder|Page wherePermission($value)
 * @method static Builder|Page whereShowBreadcrumb($value)
 * @method static Builder|Page whereShowRightColumn($value)
 * @method static Builder|Page whereShowTitle($value)
 * @method static Builder|Page whereVisibility($value)
 * @mixin Eloquent
 */
class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'name', 'title', 'slug', 'meta_title', 'meta_description', 'lang_id', 'show_title',
        'show_right_column', 'permission', 'location', 'visibility', 'show_breadcrumb', 'content',
    ];

    protected $casts = [
        'name' => 'string',
        'title' => 'string',
        'slug' => 'string',
        'meta_title' => 'string',
        'meta_description' => 'string',
        'lang_id' => 'integer',
        'show_title' => 'integer',
        'show_right_column' => 'integer',
        'permission' => 'integer',
        'location' => 'integer',
        'visibility' => 'integer',
        'show_breadcrumb' => 'integer',
        'content' => 'string',
        'parent_menu_link' => 'integer',
    ];

    const VISIBILITY_ACTIVE = 1;

    const VISIBILITY_DEACTIVE = 0;

    const SHOW_BREADCRUMP_ACTIVE = 1;

    const SHOW_BREADCRUMP_DEACTIVE = 0;

    const SHOW_RIGHT_ACTIVE = 1;

    const SHOW_RIGHT_DEACTIVE = 0;

    const SHOW_TITLE_ACTIVE = 1;

    const SHOW_TITLE_DEACTIVE = 0;

    const PERMISION_ACTIVE = 1;

    const PERMISION_DEACTIVE = 0;

    const MAIN_MENU = 2;

    const DONT_ADD_MENU = 4;

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        'name' => 'required|max:190',
        'title' => 'required|max:190',
        'lang_id' => 'required',
        'slug' => 'required|unique:pages,slug',
        'meta_description' => 'required|max:160',
        'meta_title' => 'required|max:100',
        'content' => 'nullable',
        'location' => 'required',
    ];
}
