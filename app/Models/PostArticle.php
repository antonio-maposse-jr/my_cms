<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\PostArticle
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $article_content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Post|null $postArticle
 *
 * @method static Builder|PostArticle newModelQuery()
 * @method static Builder|PostArticle newQuery()
 * @method static Builder|PostArticle query()
 * @method static Builder|PostArticle whereArticleContent($value)
 * @method static Builder|PostArticle whereCreatedAt($value)
 * @method static Builder|PostArticle whereId($value)
 * @method static Builder|PostArticle wherePostId($value)
 * @method static Builder|PostArticle whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PostArticle extends Model
{
    use HasFactory;

    protected $table = 'article_post';

    protected $fillable = ['post_id', 'article_content'];

    /**
     * @var string[]
     */
    public static $rules = [
        'article_content' => 'nullable',
    ];

    public function postArticle(): HasOne
    {
        return $this->hasOne(Post::class, 'post_id');
    }
}
