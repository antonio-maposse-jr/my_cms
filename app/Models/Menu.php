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
 * App\Models\Menu
 *
 * @property int $id
 * @property string $title
 * @property string|null $link
 * @property int|null $parent_menu_id
 * @property int|null $order
 * @property int $show_in_menu
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Navigation[] $navigation
 * @property-read int|null $navigation_count
 * @property-read Menu|null $parent
 * @property-read Collection|Menu[] $submenu
 * @property-read int|null $submenu_count
 *
 * @method static Builder|Menu newModelQuery()
 * @method static Builder|Menu newQuery()
 * @method static Builder|Menu query()
 * @method static Builder|Menu whereCreatedAt($value)
 * @method static Builder|Menu whereId($value)
 * @method static Builder|Menu whereLink($value)
 * @method static Builder|Menu whereOrder($value)
 * @method static Builder|Menu whereParentMenuId($value)
 * @method static Builder|Menu whereShowInMenu($value)
 * @method static Builder|Menu whereTitle($value)
 * @method static Builder|Menu whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'title',
        'link',
        'parent_menu_id',
        'order',
        'show_in_menu',
    ];

    protected $casts = [
        'title' => 'string',
        'link' => 'string',
        'parent_menu_id' => 'integer',
        'order' => 'integer',
        'show_in_menu' => 'boolean',
    ];

    const SHOW_MENU_ACTIVE = 1;

    const SHOW_MENU_DEACTIVE = 0;

    const SHOW_MENU = [
        self::SHOW_MENU_ACTIVE => 'Active',
        self::SHOW_MENU_DEACTIVE => 'Deactive',
    ];

    public function submenu(): HasMany
    {
        return $this->hasMany(\App\Models\Menu::class, 'parent_menu_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Menu::class, 'parent_menu_id');
    }

    public function navigation(): MorphOne
    {
        return $this->morphOne(Navigation::class, 'navigationable');
    }
}
