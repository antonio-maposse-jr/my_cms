<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PostReactionEmoji
 *
 * @property int $id
 * @property string $ip_address
 * @property int $emoji_id
 * @property int $post_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PostReactionEmoji newModelQuery()
 * @method static Builder|PostReactionEmoji newQuery()
 * @method static Builder|PostReactionEmoji query()
 * @method static Builder|PostReactionEmoji whereCreatedAt($value)
 * @method static Builder|PostReactionEmoji whereEmojiId($value)
 * @method static Builder|PostReactionEmoji whereId($value)
 * @method static Builder|PostReactionEmoji whereIpAddress($value)
 * @method static Builder|PostReactionEmoji wherePostId($value)
 * @method static Builder|PostReactionEmoji whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PostReactionEmoji extends Model
{
    use HasFactory;

    protected $table = 'post_reactions';
    protected $fillable = [
        'post_id',
        'emoji_id',
        'ip_address',
    ];

    const LIKE = 1;
    const DISLIKE = 2;
    const FUNNY = 3;
    const LOVE = 4;
    const ANGRY = 5;
    const SAD = 6;
    const WOW = 7;

}
