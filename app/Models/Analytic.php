<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Analytic
 *
 * @property int $id
 * @property string|null $uri
 * @property string|null $session
 * @property string|null $country
 * @property string|null $ip
 * @property string|null $post_id
 * @property string|null $user_id
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Analytic newModelQuery()
 * @method static Builder|Analytic newQuery()
 * @method static Builder|Analytic query()
 * @method static Builder|Analytic whereCountry($value)
 * @method static Builder|Analytic whereCreatedAt($value)
 * @method static Builder|Analytic whereId($value)
 * @method static Builder|Analytic whereIp($value)
 * @method static Builder|Analytic whereMeta($value)
 * @method static Builder|Analytic wherePostId($value)
 * @method static Builder|Analytic whereSession($value)
 * @method static Builder|Analytic whereUpdatedAt($value)
 * @method static Builder|Analytic whereUri($value)
 * @method static Builder|Analytic whereUserId($value)
 * @mixin Eloquent
 */
class Analytic extends Model
{
    use HasFactory;

    protected $table = 'analytics';

    protected $fillable = [
        'session',
        'uri',
        'country',
        'ip',
        'user_id',
        'post_id',
        'meta',
    ];

    protected $casts = [
        'session' => 'string',
        'uri' => 'string',
        'country' => 'string',
        'ip' => 'string',
        'user_id' => 'string',
        'post_id' => 'string',
    ];
}
