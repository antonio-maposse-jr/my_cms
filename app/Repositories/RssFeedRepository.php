<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\RssFeed;
use App\Models\User;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Vedmant\FeedReader\Facades\FeedReader;

/**
 * Class UserRepository
 */
class RssFeedRepository extends BaseRepository
{
    public $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'dob',
        'gender',
        'status',
        'password',

    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @param  array  $userInput
     * @return bool
     */
    public function store($input)
    {
        try {
            $rssFeed = RssFeed::create($input);
            $rssFeed->update([
                'user_id' => getLogInUserId(),
            ]);

            $feed = FeedReader::read($input['feed_url']);
            $postNo = 1;
            foreach ($feed->get_items() as $postData) {
                if ($postNo > $input['no_post']) {
                    break;
                }
                $data = [];
                $data['title'] = $postData->get_title();
                $data['description'] = $postData->get_content();
                $data['link'] = $postData->get_link();
                $data['enclosure'] = $postData->get_enclosure()->link;
                $data['source'] = $postData->get_source();
                $data['slug'] = Str::slug($data['title']);
                $post = Post::create([
                    'title' => $data['title'],
                    'slug' => $data['slug'],
                    'description' => isset($data['description']) ? $data['description'] : $data['title'],
                    'keywords' => $data['title'],
                    'visibility' => Post::VISIBILITY_ACTIVE,
                    'post_types' => Post::ARTICLE_TYPE_ACTIVE,
                    'lang_id' => $input['language_id'],
                    'category_id' => $input['category_id'],
                    'sub_category_id' => $input['subcategory_id'],
                    'status' => $input['post_draft'],
                    'created_by' => getLogInUserId(),
                    'rss_link' => $data['link'],
                    'is_rss' => true,
                    'rss_id' => $rssFeed->id,
                ]);
                try {
                    $post->addMediaFromUrl($data['enclosure'])->toMediaCollection(Post::IMAGE_POST,
                        config('app.media_disc'));
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }

                $postNo++;
            }
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function manuallyUpdate($rssFeed)
    {
        $rss = RssFeed::whereId($rssFeed['id'])->first();
        $feed = FeedReader::read($rssFeed['feed_url']);
        $postNo = 1;

        foreach ($feed->get_items() as $postData) {
            if ($postNo > $rss->no_post) {
                break;
            }
            $data = [];
            $data['title'] = $postData->get_title();
            $data['description'] = $postData->get_content();
            $data['link'] = $postData->get_link();
            $data['enclosure'] = $postData->get_enclosure()->link;
            $data['source'] = $postData->get_source();
            $data['slug'] = Str::slug($data['title']);
            $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->whereSlug($data['slug'])->first();
            if (! empty($post)) {
                $post->update([
                    'title' => $data['title'],
                    'slug' => $data['slug'],
                    'description' => isset($data['description']) ? $data['description'] : $data['title'],
                    'keywords' => $data['title'],
                    'rss_link' => $data['link'],
                    'lang_id' => $rss->language_id,
                    'category_id' => $rss->category_id,
                    'sub_category_id' => $rss->subcategory_id,
                    'status' => $rss->post_draft,
                ]);
            } else {
                $post = Post::create([
                    'title' => $data['title'],
                    'slug' => $data['slug'],
                    'description' => isset($data['description']) ? $data['description'] : $data['title'],
                    'keywords' => $data['title'],
                    'visibility' => Post::VISIBILITY_ACTIVE,
                    'post_types' => Post::ARTICLE_TYPE_ACTIVE,
                    'lang_id' => $rss->language_id,
                    'category_id' => $rss->category_id,
                    'sub_category_id' => $rss->subcategory_id,
                    'status' => $rss->post_draft,
                    'created_by' => $rss->user_id,
                    'rss_link' => $data['link'],
                    'is_rss' => true,
                    'rss_id' => $rss->id,
                ]);
                try {
                $post->addMediaFromUrl($data['enclosure'])->toMediaCollection(Post::IMAGE_POST,
                    config('app.media_disc'));
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }
            }
            $postNo++;
        }
    }

    public function update($input, $rssFeed)
    {
        $rss = RssFeed::whereId($rssFeed->id)->firstorFail();

        $rss->update($input);
    }
}
