<?php

namespace App\Models;

use App\Scopes\AuthoriseUserActivePostScope;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $keywords
 * @property int $visibility
 * @property int $featured
 * @property int $breaking
 * @property int $slider
 * @property int $recommended
 * @property int $show_on_headline
 * @property int $show_registered_user
 * @property string|null $optional_url
 * @property string $tags
 * @property int $post_types
 * @property int $lang_id
 * @property int $category_id
 * @property int|null $sub_category_id
 * @property int $scheduled_post
 * @property string|null $scheduled_post_time
 * @property int $status
 * @property string|null $rss_link
 * @property int $is_rss
 * @property int|null $rss_id
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Category $category
 * @property-read Collection|Comment[] $comment
 * @property-read int|null $comment_count
 * @property-read array $additional_image
 * @property-read array $post_file
 * @property-read array $post_file_name
 * @property-read string $post_image
 * @property-read mixed $type_name
 * @property-read Language $language
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read PostArticle|null $postArticle
 * @property-read Collection|PostGallery[] $postGalleries
 * @property-read int|null $post_galleries_count
 * @property-read Collection|PostSortList[] $postSortLists
 * @property-read int|null $post_sort_lists_count
 * @property-read SubCategory|null $subCategory
 * @property-read User $user
 *
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereBreaking($value)
 * @method static Builder|Post whereCategoryId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereCreatedBy($value)
 * @method static Builder|Post whereDescription($value)
 * @method static Builder|Post whereFeatured($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereIsRss($value)
 * @method static Builder|Post whereKeywords($value)
 * @method static Builder|Post whereLangId($value)
 * @method static Builder|Post whereOptionalUrl($value)
 * @method static Builder|Post wherePostTypes($value)
 * @method static Builder|Post whereRecommended($value)
 * @method static Builder|Post whereRssId($value)
 * @method static Builder|Post whereRssLink($value)
 * @method static Builder|Post whereScheduledPost($value)
 * @method static Builder|Post whereScheduledPostTime($value)
 * @method static Builder|Post whereShowOnHeadline($value)
 * @method static Builder|Post whereShowRegisteredUser($value)
 * @method static Builder|Post whereSlider($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereStatus($value)
 * @method static Builder|Post whereSubCategoryId($value)
 * @method static Builder|Post whereTags($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereVisibility($value)
 * @mixin Eloquent
 *
 * @property-read mixed $uploaded_video
 * @property-read \App\Models\PostVideo|null $postVideo
 */
class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'posts';

    protected $fillable = [
        'created_by', 'title', 'slug', 'description', 'keywords', 'visibility', 'featured', 'breaking', 'slider',
        'recommended', 'show_registered_user', 'tags', 'optional_url', 'additional_images ', 'files', 'lang_id',
        'category_id', 'sub_category_id', 'scheduled_post', 'scheduled_post_time', 'status', 'post_types', 'section',
        'show_on_headline', 'rss_link', 'is_rss', 'rss_id',
    ];

    protected $casts = [
        'created_by' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'visibility' => 'integer',
        'featured' => 'integer',
        'breaking' => 'integer',
        'slider' => 'integer',
        'recommended' => 'integer',
        'show_registered_user' => 'integer',
        'tags' => 'string',
        'optional_url' => 'string',
        'lang_id' => 'integer',
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'scheduled_post' => 'integer',
        'scheduled_post_time' => 'datetime',
        'status' => 'integer',
        'post_types' => 'integer',
        'show_on_headline' => 'integer',
        'is_rss' => 'boolean',
        'rss_id' => 'integer',
        'rss_link' => 'string',
    ];

    const IMAGE_POST = 'post image';

    const FILE_POST = 'post file';

    const ADDITIONAL_IMAGES = 'additional images';

    const AUDIOS_POST = 'post_audios';

    const VISIBILITY_ACTIVE = 1;

    const VISIBILITY_DEACTIVE = 0;

    const SHOW_REGISTRED_USER_ACTIVE = 1;

    const SHOW_REGISTRED_USER_DEACTIVE = 0;

    const RECOMMENDED_ACTIVE = 1;

    const RECOMMENDED_DEACTIVE = 0;

    const STATUS_ACTIVE = 1;

    const STATUS_DRAFT = 0;

    const FEATURED_ACTIVE = 1;

    const FEATURED_DEACTIVE = 0;

    const RSS_POST = 1;

    const NOT_RSS_POST = 0;

    const HEADLINE_ACTIVE = 1;

    const HEADLINE_DEACTIVE = 0;

    const BREAKING_ACTIVE = 1;

    const BREAKING_DEACTIVE = 0;

    const SLIDER_ACTIVE = 1;

    const SLIDER_DEACTIVE = 0;

    const ARTICLE = 'article';

    const GALLERY = 'gallery';

    const SORT_LIST = 'sort_list';

    const TRIVIA_QUIZ = 'trivia_quiz';

    const PERSONALITY_QUIZ = 'personality_quiz';

    const VIDEO = 'video';
    
    const AI = 'AI';

    const AUDIO = 'audio';

    const POST_FORMAT = 'post_format';
    
    const OPEN_AI_CREATE = 'open_ai/create';
    
    const ARTICLE_CREATE = 'article/create';

    const GALLERY_CREATE = 'gallery/create';

    const SORT_LIST_CREATE = 'sort_list/create';

    const TRIVIA_QUIZ_CREATE = 'trivia_quiz/create';

    const PERSONALITY_QUIZ_CREATE = 'personality_quiz/create';

    const VIDEO_CREATE = 'video/create';

    const AUDIO_CREATE = 'audio/create';

    const ADD_ARTICLE = 'add_article';
    
    const ADD_AI = 'add_ai';
 
    const ADD_GALLERY = 'add_gallery';

    const ADD_AUDIO = 'add_audio';

    const ADD_VIDEO = 'add_video';

    const ADD_TRIVIA_QUIZE = 'add_trivia_quiz';

    const ADD_PERSONALITY_QUIZ = 'add_personality_quiz';

    const ADD_SORT_LIST = 'add_sort_list';

    const ARTICLE_TYPE_ACTIVE = 1;

    const GALLERY_TYPE_ACTIVE = 2;

    const SORTED_TYPE_ACTIVE = 3;

    const TRIVIA_TYPE_ACTIVE = 4;

    const PERSONALITY_TYPE_ACTIVE = 5;

    const VIDEO_TYPE_ACTIVE = 6;

    const AUDIO_TYPE_ACTIVE = 7;

    const POST_TYPE_DEACTIVA = 0;
    
    const OPEN_AI_ACTIVE = 8;

    const TYPE = [
        self::ARTICLE_TYPE_ACTIVE => 'Article',
        self::GALLERY_TYPE_ACTIVE => 'Gallery',
        self::SORTED_TYPE_ACTIVE => 'Sorted',
        self::VIDEO_TYPE_ACTIVE => 'Video',
        self::AUDIO_TYPE_ACTIVE => 'Audio',
        self::OPEN_AI_ACTIVE => 'AI'
    ];
    const TEXT_DAVINCI_003 = 'text-davinci-003';
    const TEXT_CURIE_001 = 'text-curie-001';
    const TEXT_BABBAGE_001 ='text-babbage-001';
    const TEXT_ADA_001 = 'text-ada-001';
    const TEXT_DAVINCI_002 = 'text-davinci-002';
    const TEXT_DAVINCI_001 = 'text-davinci-001';
    const DAVINCI_INSTRUCT_BETA = 'davinci-instruct-beta';
    const DAVINCI ='davinci';
    const CURIE_INSTRUCT_BETA = 'curie-instruct-beta';
    const CURIE = 'curie';
    const BABBAGE = 'babbage';
    const ADA = 'ada';
    const CODE_DAVINCI_002 = 'code-davinci-002';
    const CODE_CUSHMAN_001 = 'code-cushman-001';
    const MODEL = [
        self::TEXT_DAVINCI_003 => 'Text davinci 003',
        self::TEXT_CURIE_001 => 'Text Curie 001',
        self::TEXT_BABBAGE_001 => 'Text Babbage 001',
        self::TEXT_ADA_001 => 'Text Ada 001',
        self::TEXT_DAVINCI_002 => 'Text Davinci 002',
        self::TEXT_DAVINCI_001 => 'Text Davinci 001',
        self::DAVINCI_INSTRUCT_BETA => 'Davinci Instruct Beta',
        self::DAVINCI => 'Davinci',
        self::CURIE_INSTRUCT_BETA => 'Curie Instruct Beta',
        self::CURIE => 'Curie',
        self::BABBAGE => 'Babbage',
        self::ADA => 'Ada',
        self::CODE_DAVINCI_002 => 'Code Davinci 002',
        self::CODE_CUSHMAN_001 => 'Code Cushman 001',
        
        ];
    const OFF = 1;
    const MOST_LIKELY = 2;
    const LEAST_LIKELY = 3;
    const  FULL_SPECTRUN = 4;
    const SHOW_PROBABILITIES = [
        self::OFF => 'Off',
        self::MOST_LIKELY => 'Most Likely',
        self::LEAST_LIKELY => 'Least Likely',
        self::FULL_SPECTRUN => 'Full Spectrum'
    ];
  

    
    protected $with = ['media'];

    protected $appends = ['post_image', 'post_file', 'additional_image', 'type_name'];

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
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return BelongsTo
     */
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function rssFeed(): BelongsTo
    {
        return $this->belongsTo(RssFeed::class, 'rss_id');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        'title' => 'required|max:190',
        'slug' => 'required|unique:posts,slug',
        'description' => 'required',
        'keywords' => 'required|max:190',
        'tags' => 'required',
        'lang_id' => 'required',
        'category_id' => 'required',
    ];

    /**
     * @return string
     */
    public function getPostImageAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::IMAGE_POST)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_web/images/default.jpg');
    }

    /**
     * @return array
     */
    public function getPostFileAttribute()
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::FILE_POST);
        $mediaUrl = [];
        foreach ($medias as $media) {
            if (! empty($media)) {
                $mediaUrl[] = $media->getFullUrl();
            } else {
                $mediaUrl = [asset('front_web/images/default.jpg')];
            }
        }

        return $mediaUrl;
    }

    /**
     * @return array
     */
    public function getPostFileNameAttribute(): array
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::FILE_POST);
        $mediaUrl = [];
        foreach ($medias as $media) {
            if (! empty($media)) {
                $mediaUrl[] = $media->file_name;
            }
        }

        return $mediaUrl;
    }

    /**
     * @return array
     */
    public function getAdditionalImageAttribute()
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::ADDITIONAL_IMAGES);
        $mediaUrl = [];
        foreach ($medias as $media) {
            if (! empty($media)) {
                $mediaUrl[] = $media->getFullUrl();
            } else {
                $mediaUrl = [asset('front_web/images/default.jpg')];
            }
        }

        return $mediaUrl;
    }

    public function getTypeNameAttribute($value): string
    {
        return self::TYPE[$this->post_types];
    }

    /**
     * @return HasOne
     */
    public function postArticle(): HasOne
    {
        return $this->hasOne(PostArticle::class);
    }

    /**
     * @return HasMany
     */
    public function postGalleries(): HasMany
    {
        return $this->hasMany(PostGallery::class);
    }

    /**
     * @return HasMany
     */
    public function postSortLists(): HasMany
    {
        return $this->hasMany(PostSortList::class);
    }

    public function postVideo(): HasOne
    {
        return $this->hasOne(PostVideo::class);
    }

    public function postAudios(): HasOne
    {
        return $this->hasOne(PostAudio::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AuthoriseUserActivePostScope());

        static::addGlobalScope(new LanguageScope());

        static::addGlobalScope(new PostDraftScope());
    }

    /**
     * @return HasMany
     */
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
    public  function  PostReaction(){
        return $this->hasMany(PostReactionEmoji::class ,'post_id','id');
    }
}
