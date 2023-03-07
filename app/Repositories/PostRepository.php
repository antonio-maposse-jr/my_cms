<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\PostArticle;
use App\Models\PostAudio;
use App\Models\PostGallery;
use App\Models\PostSortList;
use App\Models\PostVideo;
use App\Scopes\AuthoriseUserActivePostScope;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class UserRepository
 */
class PostRepository extends BaseRepository
{
    public $fieldSearchable = [
        'title',
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
        return Post::class;
    }

    /**
     * @param $input
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            $key = 'value';
            $output = array_map(function ($item) use ($key) {
                return $item->$key;
            }, json_decode($input['tags']));

            $input['tags'] = implode(',', $output);

            if (isset($input['scheduled_post'])) {
                $input['status'] = Post::STATUS_DRAFT;
            } else {
                if (isset($input['status'])) {
                    $input['status'] = Post::STATUS_DRAFT;
                    $input['visibility'] = Post::VISIBILITY_DEACTIVE;
                } else {
                    $input['status'] = Post::STATUS_ACTIVE;
                }
            }
            $postVisibilityCount = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->whereCreatedBy(getLogInUserId())->whereVisibility(1)->count();

            $input['featured'] = (isset($input['featured'])) ? Post::FEATURED_ACTIVE : Post::FEATURED_DEACTIVE;
            if (!isset($input['status'])) {
                if (Auth::user()->hasRole('customer')) {
                    $input['visibility'] = (isset($input['visibility'])) ? (($postVisibilityCount < getloginuserplan()->no_of_post) ? Post::VISIBILITY_ACTIVE : Post::VISIBILITY_DEACTIVE) : Post::VISIBILITY_DEACTIVE;
                }
                if (!Auth::user()->hasRole('customer')) {
                    $input['visibility'] = (isset($input['visibility'])) ? Post::VISIBILITY_ACTIVE : Post::VISIBILITY_DEACTIVE;

                }
            }
            $input['breaking'] = (isset($input['breaking'])) ? Post::BREAKING_ACTIVE : Post::BREAKING_DEACTIVE;

            $input['slider'] = (isset($input['slider'])) ? Post::SLIDER_ACTIVE : Post::SLIDER_DEACTIVE;

            $input['recommended'] = (isset($input['recommended'])) ? Post::RECOMMENDED_ACTIVE : Post::RECOMMENDED_DEACTIVE;

            $input['slider'] = (isset($input['slider'])) ? Post::SLIDER_ACTIVE : Post::SLIDER_DEACTIVE;

            $input['show_registered_user'] = (isset($input['show_registered_user'])) ? Post::SHOW_REGISTRED_USER_ACTIVE : Post::SHOW_REGISTRED_USER_DEACTIVE;

            $input['show_on_headline'] = (isset($input['show_on_headline'])) ? Post::HEADLINE_ACTIVE : Post::HEADLINE_DEACTIVE;

            $postInputArray = Arr::only($input, [
                'created_by', 'title', 'slug', 'description', 'keywords', 'visibility', 'featured',
                'breaking', 'slider', 'recommended', 'show_registered_user', 'tags', 'optional_url',
                'additional_images',
                'files', 'lang_id', 'category_id', 'sub_category_id', 'scheduled_post', 'status', 'post_types',
                'section', 'show_on_headline', 'scheduled_post_time',
            ]);

            $post = Post::create($postInputArray);
            if (isset($input['image']) && !empty($input['image'])) {
                $post->addMedia($input['image'])->toMediaCollection(Post::IMAGE_POST, config('app.media_disc'));
            }

            if (isset($input['file']) && !empty($input['file'])) {
                foreach ($input['file'] as $file) {
                    $post->addMedia($file)->toMediaCollection(Post::FILE_POST, config('app.media_disc'));
                }
            }

            if (isset($input['additional_images']) && !empty($input['additional_images'])) {
                foreach ($input['additional_images'] as $additional_image) {
                    $post->addMedia($additional_image)->toMediaCollection(Post::ADDITIONAL_IMAGES,
                        config('app.media_disc'));
                }
            }
            
            if ($input['post_types'] == Post::ARTICLE_TYPE_ACTIVE || $input['post_types'] == Post::OPEN_AI_ACTIVE) {
                $this->postArticleSave($input, $post);
            } else {
                if ($input['post_types'] == Post::GALLERY_TYPE_ACTIVE) {
                    $this->postGallerySave($input, $post);
                } else {
                    if ($input['post_types'] == Post::SORTED_TYPE_ACTIVE) {
                        $this->postSortedListSave($input, $post);
                    } else {
                        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE) {
                            $this->postVideoSave($input, $post);
                        } else {
                            if ($input['post_types'] == Post::AUDIO_TYPE_ACTIVE) {
                                $this->postAudioSave($input, $post);
                            }
                        }
                    }
                }
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $id
     * @return bool
     */
    public function update($input, $id): bool
    {
        try {
            DB::beginTransaction();
            $key = 'value';
            $output = array_map(function ($item) use ($key) {
                return $item->$key;
            }, json_decode($input['tags']));

            $input['tags'] = implode(',', $output);

            if (isset($input['scheduled_post'])) {
                $input['status'] = Post::STATUS_DRAFT;
            } else {
                if (isset($input['status'])) {
                    $input['status'] = Post::STATUS_DRAFT;
                } else {
                    $input['status'] = Post::STATUS_ACTIVE;
                    $input['scheduled_post'] = Post::STATUS_DRAFT;
                    $input['scheduled_post_time'] = null;
                }
            }

            $postVisibilityCount = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->whereCreatedBy(getLogInUserId())->whereVisibility(1)->count();

            $input['featured'] = (isset($input['featured'])) ? Post::FEATURED_ACTIVE : Post::FEATURED_DEACTIVE;

            if (Auth::user()->hasRole('customer')) {
                $input['visibility'] = (isset($input['visibility'])) ? (($postVisibilityCount < getloginuserplan()->no_of_post) ? Post::VISIBILITY_ACTIVE : Post::VISIBILITY_DEACTIVE) : Post::VISIBILITY_DEACTIVE;
            }
            if (!Auth::user()->hasRole('customer')) {
                $input['visibility'] = (isset($input['visibility'])) ? Post::VISIBILITY_ACTIVE : Post::VISIBILITY_DEACTIVE;

            }

            $input['breaking'] = (isset($input['breaking'])) ? Post::BREAKING_ACTIVE : Post::BREAKING_DEACTIVE;

            $input['slider'] = (isset($input['slider'])) ? Post::SLIDER_ACTIVE : Post::SLIDER_DEACTIVE;

            $input['recommended'] = (isset($input['recommended'])) ? Post::RECOMMENDED_ACTIVE : Post::RECOMMENDED_DEACTIVE;

            $input['show_registered_user'] = (isset($input['show_registered_user'])) ? Post::SHOW_REGISTRED_USER_ACTIVE
                : Post::SHOW_REGISTRED_USER_DEACTIVE;

            $input['show_on_headline'] = (isset($input['show_on_headline'])) ? Post::HEADLINE_ACTIVE : Post::HEADLINE_DEACTIVE;

            $postInputArray = Arr::only($input, [
                'created_by', 'title', 'slug', 'description', 'keywords', 'visibility', 'featured',
                'breaking', 'slider', 'recommended', 'show_registered_user', 'tags', 'optional_url',
                'additional_images',
                'files', 'lang_id', 'category_id', 'sub_category_id', 'scheduled_post', 'status', 'post_types',
                'section', 'show_on_headline', 'scheduled_post_time',
            ]);

            $post = Post::withoutGlobalScope(AuthoriseUserActivePostScope::class)->withoutGlobalScope(LanguageScope::class)
                ->withoutGlobalScope(PostDraftScope::class)
                ->findorFail($id);
            $post->update($postInputArray);

            if (isset($input['image']) && !empty($input['image'])) {
                $post->clearMediaCollection(Post::IMAGE_POST);
                $post->addMedia($input['image'])->toMediaCollection(Post::IMAGE_POST, config('app.media_disc'));
            }

            if (isset($input['file']) && !empty($input['file'])) {
                $post->clearMediaCollection(Post::FILE_POST);
                foreach ($input['file'] as $file) {
                    $post->addMedia($file)->toMediaCollection(Post::FILE_POST, config('app.media_disc'));
                }
            }

            if (isset($input['additional_images']) && !empty($input['additional_images'])) {
                $post->clearMediaCollection(Post::ADDITIONAL_IMAGES);
                foreach ($input['additional_images'] as $additional_image) {
                    $post->addMedia($additional_image)->toMediaCollection(Post::ADDITIONAL_IMAGES,
                        config('app.media_disc'));
                }
            }
            if ($input['post_types'] == Post::ARTICLE_TYPE_ACTIVE || $input['post_types'] == Post::OPEN_AI_ACTIVE) {
                $this->postArticleUpdate($input, $post);
            } else {
                if ($input['post_types'] == Post::GALLERY_TYPE_ACTIVE) {
                    $this->postGalleryUpdate($input, $post);
                } else {
                    if ($input['post_types'] == Post::SORTED_TYPE_ACTIVE) {
                        $this->postSortListUpdate($input, $post);
                    } else {
                        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE) {
                            $this->postVideoUpdate($input, $post);
                        } else {
                            if ($input['post_types'] == Post::AUDIO_TYPE_ACTIVE) {
                                $this->postAudioUpdate($input, $post);
                            }
                        }
                    }
                }
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $post
     * @return bool
     */
    public function postAudioSave($input, $post): bool
    {
        $audioInputArray = Arr::only($input, ['audio_content']);
        $audio = new PostAudio($audioInputArray);
        $postAudio = $post->PostAudios()->save($audio);

        if (isset($input['audios']) && !empty($input['audios'])) {
            foreach ($input['audios'] as $audio) {
                $postAudio->addMedia($audio)->toMediaCollection(PostAudio::AUDIOS_POST, config('app.media_disc'));
            }
        }

        return true;
    }

    /**
     * @param $input
     * @param $post
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @return bool
     *
     */
    public function postAudioUpdate($input, $post): bool
    {
        $audioInputArray = Arr::only($input, ['audio_content']);
        $postAudio = PostAudio::wherePostId($post->id)->first();
        $postAudio->update(['audio_content' => $audioInputArray['audio_content']]);

        if (isset($input['audios']) && !empty($input['audios'])) {
            $postAudio->clearMediaCollection(PostAudio::AUDIOS_POST);
            foreach ($input['audios'] as $audio) {
                $postAudio->addMedia($audio)->toMediaCollection(PostAudio::AUDIOS_POST, config('app.media_disc'));
            }
        }

        return true;
    }

    /**
     * @param $input
     * @param $post
     * @return bool
     */
    public function postArticleSave($input, $post)
    {
     
        $articleInputArray = Arr::only($input, ['article_content']);
        $article = new PostArticle($articleInputArray);
        $post->postArticle()->save($article);

        return true;
    }

    /**
     * @param $input
     * @param $post
     * @return bool
     */
    public function postArticleUpdate($input, $post): bool
    {
        $articleInputArray = Arr::only($input, ['article_content']);
        PostArticle::wherePostId($post->id)->update(['article_content' => $articleInputArray['article_content']]);

        return true;
    }

    /**
     * @param $input
     * @param $post
     */
    public function postGallerySave($input, $post)
    {
        $postGalleryArray = Arr::only($input,
            ['gallery_title', 'image_description', 'gallery_content', 'gallery_images']);
        $galleyItemInputs = $this->prepareInputForItem($postGalleryArray);
        foreach ($galleyItemInputs as $key => $data) {
            $gallery = new PostGallery($data);
            /** @var Post $post */
            if ($data['gallery_title'] != null || $data['image_description'] != null || $data['gallery_content'] != null) {
                $postGallery = $post->postGalleries()->save($gallery);

                if (isset($data['gallery_images']) && !empty($data['gallery_images'])) {
                    $postGallery->addMedia($data['gallery_images'])->toMediaCollection(PostGallery::IMAGES,
                        config('app.media_disc'));
                }
            }
        }
    }

    /**
     * @param $input
     * @param $id
     */
    public function postGalleryUpdate($input, $post)
    {
        $postGalleryArray = Arr::only($input,
            [
                'gallery_title', 'image_description', 'gallery_content', 'gallery_images', 'gallery_image_remove',
                'gallery_id',
            ]);
        $galleryItemInputs = $this->prepareInputForItem($postGalleryArray);

        $oldGalleryPost = PostGallery::where('post_id', '=', $post->id)->pluck('id')->toArray();
        $currentGallery = !empty($postGalleryArray['gallery_id']) ? $postGalleryArray['gallery_id'] : [];
        $remainingGalleryPost = array_diff($oldGalleryPost, $currentGallery);
        if (count($remainingGalleryPost)) {
            PostGallery::whereIn('id', $remainingGalleryPost)->delete();
        }

        foreach ($galleryItemInputs as $key => $data) {
            if (!empty($data['gallery_id'])) {
                $gallery = PostGallery::find($data['gallery_id']);
                $gallery->update($data);

                if ($data['gallery_title'] == null && $data['image_description'] == null && $data['gallery_content'] == null) {
                    $gallery = PostGallery::find($data['gallery_id'])->delete();
                }
            } elseif ($data['gallery_title'] != null || $data['image_description'] != null || $data['gallery_content'] != null) {
                $galleryItem = new PostGallery($data);
                $gallery = $post->postGalleries()->save($galleryItem);
            }

            /** @var Post $post */
            if (isset($data['gallery_images']) && !empty($data['gallery_images'])) {
                $gallery->clearMediaCollection(PostGallery::IMAGES);
                $gallery->media()->delete();
                $gallery->addMedia($data['gallery_images'])->toMediaCollection(PostGallery::IMAGES,
                    config('app.media_disc'));
            }
            if ($input['gallery_image_remove'] == 1 && isset($input['gallery_image_remove']) && empty($input['gallery_images'])) {
                $gallery->clearMediaCollection(PostGallery::IMAGES);
                $gallery->media()->delete();
            }
        }
    }

    /**
     * @param $input
     * @param $post
     */
    public function postSortedListSave($input, $post)
    {
        $postSortListArray = Arr::only($input,
            ['sort_list_title', 'image_description', 'sort_list_content', 'sort_list_images']);
        $sortListItemInputs = $this->prepareInputForItem($postSortListArray);
        foreach ($sortListItemInputs as $key => $data) {
            $sortList = new PostSortList($data);
            /** @var Post $post */
            if ($data['sort_list_title'] != null || $data['image_description'] != null || $data['sort_list_content'] != null) {
                $postSortList = $post->postSortLists()->save($sortList);

                if (isset($data['sort_list_images']) && !empty($data['sort_list_images'])) {
                    $postSortList->addMedia($data['sort_list_images'])->toMediaCollection(PostSortList::IMAGES,
                        config('app.media_disc'));
                }
            }
        }
    }

    /**
     * @param $input
     * @param $post
     */
    public function postSortListUpdate($input, $post)
    {
        $postSortListArray = Arr::only($input, [
            'sort_list_title', 'image_description', 'sort_list_content', 'sorted_list_image', 'sort_list_id',
            'sorted_list_image_remove',
        ]);

        $oldSortPost = PostSortList::where('post_id', '=', $post->id)->pluck('id')->toArray();
        $currentSortList = !empty($postSortListArray['sort_list_id']) ? $postSortListArray['sort_list_id'] : [];
        $remainingSortPost = array_diff($oldSortPost, $currentSortList);
        if (count($remainingSortPost)) {
            PostSortList::whereIn('id', $remainingSortPost)->delete();
        }

        $sortListItemInputs = $this->prepareInputForItem($postSortListArray);
        foreach ($sortListItemInputs as $key => $data) {
            if (!empty($data['sort_list_id'])) {
                $sortList = PostSortList::findOrFail($data['sort_list_id']);
                $sortList->update($data);

                if ($data['sort_list_title'] == null && $data['image_description'] == null && $data['sort_list_content'] == null) {
                    $sortList = PostSortList::find($data['sort_list_id'])->delete();
                }
            } elseif ($data['sort_list_title'] != null || $data['image_description'] != null || $data['sort_list_content'] != null) {
                $sortListItem = new PostSortList($data);
                $sortList = $post->postSortLists()->save($sortListItem);
            }

            /** @var Post $post */
            if (isset($data['sorted_list_image']) && !empty($data['sorted_list_image'])) {
                $sortList->clearMediaCollection(PostSortList::IMAGES);
                $sortList->media()->delete();
                $sortList->addMedia($data['sorted_list_image'])->toMediaCollection(PostSortList::IMAGES,
                    config('app.media_disc'));
            }
            if (isset($input['sorted_list_image_remove']) && $input['sorted_list_image_remove'] == 1 && empty($input['sorted_list_image'])) {
                $sortList->clearMediaCollection(PostSortList::IMAGES);
                $sortList->media()->delete();
            }
        }
    }

    /**
     * @param $input
     * @param $post
     * @return bool
     */
    public function postVideoSave($input, $post)
    {
        $videoInputArray = Arr::only($input, ['video_content', 'thumbnail_image_url', 'video_url', 'video_embed_code']);
        $postVideo = new PostVideo($videoInputArray);
        $postVideo = $post->postVideo()->save($postVideo);

        /** @var Post $postVideo */
        if (empty($input['thumbnail_image_url']) && isset($input['thumbnailImage']) && !empty($input['thumbnailImage'])) {
            $postVideo->addMedia($input['thumbnailImage'])->toMediaCollection(PostVideo::THUMBNAIL_PATH,
                config('app.media_disc'));
        }

        if (empty($input['video_url']) && isset($input['uploadVideo']) && !empty($input['uploadVideo'])) {
            $postVideo->addMedia($input['uploadVideo'])->toMediaCollection(PostVideo::VIDEO_PATH,
                config('app.media_disc'));
        }

        return true;
    }

    /**
     * @param $input
     * @param $post
     * @return bool
     */
    public function postVideoUpdate($input, $post)
    {
        $videoInputArray = Arr::only($input, ['video_content', 'thumbnail_image_url', 'video_url', 'video_embed_code']);
        PostVideo::wherePostId($post->id)->update([
            'video_content' => $videoInputArray['video_content'],
            'thumbnail_image_url' => $videoInputArray['thumbnail_image_url'],
            'video_url' => $videoInputArray['video_url'],
            'video_embed_code' => $videoInputArray['video_embed_code'],
        ]);

        $postVideo = PostVideo::wherePostId($post->id)->first();

        if (!empty($videoInputArray['video_embed_code']) && !empty($videoInputArray['thumbnail_image_url'])) {
            $postVideo->clearMediaCollection(PostVideo::VIDEO_PATH);
        }

        /** @var Post $postVideo */
        if (empty($input['thumbnail_image_url']) && isset($input['thumbnailImage']) && !empty($input['thumbnailImage'])) {
            $postVideo->clearMediaCollection(PostVideo::THUMBNAIL_PATH);
            $postVideo->addMedia($input['thumbnailImage'])->toMediaCollection(PostVideo::THUMBNAIL_PATH,
                config('app.media_disc'));
        }

        if (empty($input['video_url']) && isset($input['uploadVideo']) && !empty($input['uploadVideo'])) {
            $postVideo->clearMediaCollection(PostVideo::VIDEO_PATH);
            $postVideo->addMedia($input['uploadVideo'])->toMediaCollection(PostVideo::VIDEO_PATH,
                config('app.media_disc'));
        }

        return true;
    }

    /**
     * @param array $input
     * @return array
     */
    public function prepareInputForItem(array $input): array
    {
        $items = [];
        foreach ($input as $key => $data) {
            foreach ($data as $index => $value) {
                $items[$index][$key] = $value;
            }
        }

        return $items;
    }
}
