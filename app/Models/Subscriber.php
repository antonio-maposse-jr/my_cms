<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Subscriber
 *
 * @property int $id
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Subscriber newModelQuery()
 * @method static Builder|Subscriber newQuery()
 * @method static Builder|Subscriber query()
 * @method static Builder|Subscriber whereCreatedAt($value)
 * @method static Builder|Subscriber whereEmail($value)
 * @method static Builder|Subscriber whereId($value)
 * @method static Builder|Subscriber whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Subscriber extends Model
{
    use HasFactory;

    protected $table = 'subscribers';

    protected $fillable = ['email'];

    protected $casts = [
        'email' => 'string',
    ];
}
