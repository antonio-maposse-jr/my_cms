<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class BulkPostImport implements ToCollection
{
    /**
     * @param  Collection  $collection
     */
    public function collection(Collection $collection)
    {
        $collections = $collection->toArray();
        foreach (array_slice($collections, 1) as $col) {
            $data = [];
            $data[$collections[0][0]] = $col[0];
            $data[$collections[0][1]] = $col[1];
            $data[$collections[0][2]] = $col[2];
            $data[$collections[0][3]] = $col[3];
            $data[$collections[0][4]] = $col[4];
            $data[$collections[0][5]] = $col[5];
            $data[$collections[0][6]] = $col[6];
            $data[$collections[0][7]] = $col[7];
            $data[$collections[0][8]] = $col[8];
            $data[$collections[0][8]] = $col[8];
            $data['slug'] = strtolower(Str::slug($data['title']));
            $data['visibility'] = (isset($data['visibility'])) ? $data['visibility'] : Post::VISIBILITY_DEACTIVE;
            $data['featured'] = Post::FEATURED_DEACTIVE;
            $data['breaking'] = Post::BREAKING_DEACTIVE;
            $data['slider'] = Post::SLIDER_DEACTIVE;
            $data['recommended'] = Post::RECOMMENDED_DEACTIVE;
            $data['show_on_headline'] = Post::HEADLINE_DEACTIVE;
            $data['show_registered_user'] = Post::SHOW_REGISTRED_USER_DEACTIVE;
            $data['post_types'] = Post::ARTICLE_TYPE_ACTIVE;
            $data['created_by'] = getLogInUserId();
            $data['status'] = Post::STATUS_ACTIVE;
            $validation = Validator::make($data, [
                'title'       => 'required|max:190|unique:posts,title',
                'slug'        => 'required|unique:posts,slug',
                'description' => 'required',
                'keywords'    => 'required|max:190',
                'tags'        => 'required',
                'lang_id'     => 'required',
                'category_id' => 'required',
            ]);
            if ($validation->passes()) {
                try {
                    $post = Post::create($data);
                    $post->addMediaFromUrl($data['image'])->toMediaCollection(Post::IMAGE_POST,
                        config('app.media_disc'));
                } catch (\Exception $e) {
                    DB::rollBack();

                    throw new UnprocessableEntityHttpException($e->getMessage());
                }
            }
            $this->errors = $validation->messages();

        }
    }
}
