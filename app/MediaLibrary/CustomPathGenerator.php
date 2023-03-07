<?php

namespace App\MediaLibrary;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\PostGallery;
use App\Models\PostSortList;
use App\Models\PostVideo;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

/**
 * Class CustomPathGenerator
 */
class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $path = '{PARENT_DIR}'.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;

        switch ($media->collection_name) {
            case User::PROFILE:
                return str_replace('{PARENT_DIR}', User::PROFILE, $path);
            case Setting::LOGO:
                return str_replace('{PARENT_DIR}', Setting::LOGO, $path);
            case Setting::FAVICON:
                return str_replace('{PARENT_DIR}', Setting::FAVICON, $path);
            case User::NEWS_IMAGE:
                return str_replace('{PARENT_DIR}', User::NEWS_IMAGE, $path);
            case Gallery::GALLERY_IMAGE:
                return str_replace('{PARENT_DIR}', Gallery::GALLERY_IMAGE, $path);
            case Post::IMAGE_POST:
                return str_replace('{PARENT_DIR}', Post::IMAGE_POST, $path);
            case Post::FILE_POST:
                return str_replace('{PARENT_DIR}', Post::FILE_POST, $path);
            case Post::ADDITIONAL_IMAGES:
                return str_replace('{PARENT_DIR}', Post::ADDITIONAL_IMAGES, $path);
            case PostVideo::VIDEO_PATH:
                return str_replace('{PARENT_DIR}', PostVideo::VIDEO_PATH, $path);
            case PostVideo::THUMBNAIL_PATH:
                return str_replace('{PARENT_DIR}', PostVideo::THUMBNAIL_PATH, $path);
            case Post::AUDIOS_POST:
                return str_replace('{PARENT_DIR}', Post::AUDIOS_POST, $path);
            case PostGallery::IMAGES:
                return str_replace('{PARENT_DIR}', PostGallery::IMAGES, $path);
            case PostSortList::IMAGES:
                return str_replace('{PARENT_DIR}', PostSortList::IMAGES, $path);
            case Subscription::ATTACHMENT_PATH:
                return str_replace('{PARENT_DIR}', Subscription::ATTACHMENT_PATH, $path);
            case 'default':
                return '';
        }
    }

    /**
     * @param  Media  $media
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media).'thumbnails/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'rs-images/';
    }
}
