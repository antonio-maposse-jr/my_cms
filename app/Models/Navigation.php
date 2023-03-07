<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Navigation
 *
 * @property int $id
 * @property string|null $navigationable_type
 * @property int|null $navigationable_id
 * @property int|null $order_id
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|Eloquent $navigationable
 *
 * @method static Builder|Navigation newModelQuery()
 * @method static Builder|Navigation newQuery()
 * @method static Builder|Navigation query()
 * @method static Builder|Navigation whereCreatedAt($value)
 * @method static Builder|Navigation whereId($value)
 * @method static Builder|Navigation whereNavigationableId($value)
 * @method static Builder|Navigation whereNavigationableType($value)
 * @method static Builder|Navigation whereOrderId($value)
 * @method static Builder|Navigation whereParentId($value)
 * @method static Builder|Navigation whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Navigation extends Model
{
    use HasFactory;

    protected $table = 'navigation';

    protected $fillable = [
        'navigationable_type',
        'navigationable_id',
        'order_id',
        'parent_id',
    ];

    protected $casts = [
        'navigationable_type' => 'string',
        'navigationable_id' => 'integer',
        'order_id' => 'integer',
        'parent_id' => 'integer',
    ];

    public function navigationable()
    {
        return $this->morphTo();
    }
}
