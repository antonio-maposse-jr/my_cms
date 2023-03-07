<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Emoji
 *
 * @property int $id
 * @property string $emoji
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji query()
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji whereEmoji($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Emoji whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Emoji extends Model
{
    use HasFactory;

    protected $fillable = ['emoji', 'status', 'name'];

    public const ACTIVE = 1;
    public const DISABLE = 0;

    protected $casts = [
        'emoji'  => 'string',
        'status' => 'integer',
        'name'   => 'string',
    ];

    public static array $rules = [
        'emoji' => 'required',
        'name'  => 'required|unique:emoji,name',
    ];
}
