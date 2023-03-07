<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $website
 * @property string $comment
 * @property int $post_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereComment($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereEmail($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereName($value)
 * @method static Builder|Comment wherePostId($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @method static Builder|Comment whereWebsite($value)
 * @mixin Eloquent
 */
class Comment extends Model
{
    use HasFactory;

    public static $rules = [
        'name' => 'required|max:190',
        'email' => 'required|email:filter',
        'comment' => 'required',
    ];

    protected $table = 'comments';

    protected $fillable = [
        'name',
        'email',
        'comment',
        'status',
        'post_id',
        'user_id',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'comment' => 'string',
        'status' => 'integer',
        'post_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
