<?php

namespace App\Http\Controllers;

use App\Exports\BulkPostExport;
use App\Http\Requests\CreateBulkPostRequest;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\ImageUploadReuest;
use App\Http\Requests\OpenAIRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Imports\BulkPostImport;
use App\Models\Analytic;
use App\Models\Category;
use App\Models\Emoji;
use App\Models\Language;
use App\Models\Post;
use App\Models\PostReactionEmoji as PostReactionEmojiAlias;
use App\Models\PostVideo;
use App\Models\SubCategory;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Scopes\AuthoriseUserActivePostScope;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Auth;
use Cohensive\OEmbed\Facades\OEmbed;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostController extends AppBaseController
{
    /**
     * @var PostRepository
     */
    private $PostRepository;

    /**
     * CategoryRepository constructor.
     *
     * @param  PostRepository  $PostRepository
     */
    public function __construct(PostRepository $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $subCategories = SubCategory::toBase()->get();
        $categories = Category::toBase()->get();

        return view('post.index', compact('subCategories', 'categories'));
    }

    /**
     * @param  CreatePostRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreatePostRequest $request)
    {
        
        $input = $request->all();
        if ($input['post_types'] == Post::ARTICLE_TYPE_ACTIVE && empty($input['image']) && empty($input['image'])) {
            return redirect::back()->withInput($input)->withErrors(['Thumbnail image is required']);
        }
        if ($input['post_types'] == Post::OPEN_AI_ACTIVE && empty($input['image']) && empty($input['image'])) {
            return redirect::back()->withInput($input)->withErrors(['Thumbnail image is required']);
        }
        if ($input['post_types'] == Post::GALLERY_TYPE_ACTIVE && empty($input['image']) && empty($input['image'])) {
            return redirect::back()->withInput($input)->withErrors(['Thumbnail image is required']);
        }
        if ($input['post_types'] == Post::SORTED_TYPE_ACTIVE && empty($input['image']) && empty($input['image'])) {
            return redirect::back()->withInput($input)->withErrors(['Thumbnail image is required']);
        }

        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE && empty($input['thumbnailImage']) && empty($input['thumbnail_image_url'])) {
            return redirect::back()->withInput($input)->withErrors(['Thumbnail image is required']);
        }

        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE && (empty($input['video_url']) || empty($input['video_embed_code'])) && empty($input['uploadVideo'])) {
            return redirect::back()->withInput($input)->withErrors(['Please enter video url or upload video']);
        }

        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE && !empty($input['video_url'] || !empty($input['video_embed_code'])) && !empty($input['uploadVideo'])) {
            return redirect::back()->withInput($input)->withErrors(['You can use any one of upload video or video URL option']);
        }

        if ($input['post_types'] == Post::AUDIO_TYPE_ACTIVE && isset($input['audios']) && ! isset($input['image'])) {
            return redirect::back()->withInput($input)->withErrors(['Thumbnail image is required']);
        }

        if ($input['post_types'] == Post::AUDIO_TYPE_ACTIVE && empty($input['audios'])) {
            return redirect::back()->withInput($input)->withErrors(['Please select audio file']);
        }

        if (count(explode(' ', $request->keywords)) > 10) {
            return redirect::back()->withInput($input)->withErrors(['Keyword should be of maximum 10 words only']);
        }
        if ($request['scheduled_post'] == 1) {
            $request->validate(['scheduled_post_time' => 'required']);
        }
        $input = $request->all();
        $input['created_by'] = (!empty($input['created_by'])) ? $input['created_by'] : getLogInUserId();
        
        $this->PostRepository->store($input);

        Flash::success('Post created successfully.');
        if (!Auth::user()->hasRole('customer')) {
            return redirect(route('posts.index'));
        }

        if (Auth::user()->hasRole('customer')) {
            return redirect(route('customer-posts.index'));
        }
    }


    public function show($id)
    { 
        $post =Post::whereId($id)->withoutGlobalScope(AuthoriseUserActivePostScope::class)
                    ->withoutGlobalScope(LanguageScope::class)
                    ->withoutGlobalScope(PostDraftScope::class)
                    ->with('PostReaction','user','language','category','subCategory')->first();
        $countEmoji = PostReactionEmojiAlias::wherePostId($post->id)->get()->groupBy('emoji_id');
        $emojis = Emoji::whereStatus(Emoji::ACTIVE)->get();
        return view('post.show',compact('post','countEmoji','emojis'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function postFormat(Request $request)
    {
        $sectionName = ($request->get('section') === null) ? 'post_format' : $request->get('section');


if ($request->get('section') != null) {
            if ($sectionName == Post::ARTICLE) {
                $sectionType = Post::ARTICLE_TYPE_ACTIVE;
            } elseif ($sectionName == Post::GALLERY) {
                $sectionType = Post::GALLERY_TYPE_ACTIVE;
            } elseif ($sectionName == Post::SORT_LIST) {
                $sectionType = Post::SORTED_TYPE_ACTIVE;
            } elseif ($sectionName == Post::TRIVIA_QUIZ) {
                $sectionType = Post::TRIVIA_TYPE_ACTIVE;
            } elseif ($sectionName == Post::PERSONALITY_QUIZ) {
                $sectionType = Post::PERSONALITY_TYPE_ACTIVE;
            } elseif ($sectionName == Post::VIDEO) {
                $sectionType = Post::VIDEO_TYPE_ACTIVE;
            } elseif ($sectionName == Post::AI) {
                $sectionType = Post::OPEN_AI_ACTIVE;
            } else {
                $sectionType = Post::AUDIO_TYPE_ACTIVE;
            }

            return view('post.post_table', compact('sectionName', 'sectionType'));
        }

        return view("post.$sectionName", compact('sectionName'));
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function postType(Request $request)
    {
        if ($request->get('section') === null) {
            return \redirect(route('posts.index'));
        }
        $sectionName = ($request->get('section') === null) ? 'article-create' : $request->get('section');
        $allStaff = User::where('type', User::STAFF)->pluck('first_name', 'id');

        if ($sectionName == Post::POST_FORMAT) {
            if (Auth::user()->hasRole('customer'))
            {
                return redirect()->route('customer.post_format');
            }
            return redirect()->route(Post::POST_FORMAT);
        } elseif ($sectionName == Post::GALLERY_CREATE) {
            $sectionType = Post::GALLERY_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_GALLERY;
            $addRouteSection = Post::GALLERY;
        } elseif ($sectionName == Post::SORT_LIST_CREATE) {
            $sectionType = Post::SORTED_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_SORT_LIST;
            $addRouteSection = Post::SORT_LIST;
        } elseif ($sectionName == Post::TRIVIA_QUIZ_CREATE) {
            $sectionType = Post::TRIVIA_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_TRIVIA_QUIZE;
            $addRouteSection = Post::TRIVIA_QUIZ;
        } elseif ($sectionName == Post::PERSONALITY_QUIZ_CREATE) {
            $sectionType = Post::PERSONALITY_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_PERSONALITY_QUIZ;
            $addRouteSection = Post::PERSONALITY_QUIZ;
        } elseif ($sectionName == Post::VIDEO_CREATE) {
            $sectionType = Post::VIDEO_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_VIDEO;
            $addRouteSection = Post::VIDEO;
        } elseif ($sectionName == Post::AUDIO_CREATE) {
            $sectionType = Post::AUDIO_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_AUDIO;
            $addRouteSection = Post::AUDIO;
        } elseif ($sectionName == Post::OPEN_AI_CREATE){
            $sectionType = Post::OPEN_AI_ACTIVE;
            $sectionAdd = Post::ADD_AI;
            $addRouteSection = Post::AI;
        } else {
            $sectionType = Post::ARTICLE_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_ARTICLE;
            $addRouteSection = Post::ARTICLE;
        }

        return view('post.create', compact('sectionName', 'sectionType', 'sectionAdd', 'addRouteSection', 'allStaff'));
    }

    public function edit($post)
    {
        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->with([
            'language', 'category', 'subCategory', 'postArticle', 'postAudios', 'postGalleries.media', 'postSortLists.media',
        ])->findOrFail($post);
        $sectionType = $post->post_types;
        $allStaff = User::where('type', User::STAFF)->pluck('first_name', 'id');

        return view('post.edit', compact('post', 'sectionType', 'allStaff'));
    }

    /**
     * Update the specified Staff in storage.
     *
     * @param  UpdateStaffRequest  $request
     * @param  User  $staff
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdatePostRequest $request)
    {
        if ($request['scheduled_post'] == 1) {
            $request->validate(['scheduled_post_time' => 'required']);
        }
        $input = $request->all();
        $postVideo = PostVideo::wherePostId($input['id'])->first();

        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE && ! empty($input['video_url']) && ! empty($input['uploadVideo'])) {
            return redirect::back()->withErrors(['You can use any one of upload video or video URL option']);
        }

        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE && (empty($input['video_url']) || empty($input['video_embed_code'])) && $postVideo->getMedia(PostVideo::VIDEO_PATH)->count() == 0 && empty($input['uploadVideo'])) {
            return redirect::back()->withErrors(['Please enter video url or upload a video']);
        }

        if ($input['post_types'] == Post::VIDEO_TYPE_ACTIVE && empty($input['thumbnailImage']) && empty($input['thumbnail_image_url']) && $postVideo->getMedia(PostVideo::THUMBNAIL_PATH)->count() == 0) {
            return redirect::back()->withErrors(['Thumbnail image is required']);
        }

        $input['created_by'] = (! empty($input['created_by'])) ? $input['created_by'] : getLogInUserId();
        $this->PostRepository->update($input, $input['id']);

        Flash::success('Post updated successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return JsonResponse
     */
    public function destroy($post)
    {
        Analytic::wherePostId($post)->delete();
        Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->find($post)->delete();

        return $this->sendSuccess('Post deleted successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function language(Request $request)
    {
        $category = Category::where('lang_id', $request->data)->pluck('id', 'name')->toArray();

        return $this->sendResponse($category, 'Category retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function category(Request $request)
    {
        $sub_category = SubCategory::where('parent_category_id', $request->cat_id)->where('lang_id', $request->lang_id)
            ->pluck('id', 'name');

        return $this->sendResponse($sub_category, 'Sub category retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function categoryFilter(Request $request)
    {
        if ($request->cat_id == null) {
            $sub_category = SubCategory::all()->pluck('id', 'name');
        } else {
            $sub_category = SubCategory::where('parent_category_id', $request->cat_id)->pluck('id', 'name');
        }

        return $this->sendResponse($sub_category, 'Sub category retrieved successfully.');
    }

    /**
     * @param  ImageUploadReuest  $request
     * @return mixed
     */
    public function imgUpload(ImageUploadReuest $request)
    {
        $input = $request->all();
        $user = getLogInUser();

        $imageCheck = Media::where('collection_name', User::NEWS_IMAGE)->where('file_name', $input['image']->getClientOriginalName())->exists();
        if (! $imageCheck) {
            if ((! empty($input['image']))) {
                $media = $user->addMedia($input['image'])->toMediaCollection(User::NEWS_IMAGE);
            }
            $data['url'] = $media->getFullUrl();
            $data['mediaId'] = $media->id;

            return $this->sendResponse($data, 'Image Upload successfully');
        } else {
            return $this->sendError('Already Image Exist');
        }
    }

    /**
     * @return mixed
     */
    public function imageGet()
    {
        $images = getLogInUser()->getMedia(User::NEWS_IMAGE);
        $data = [];
        foreach ($images as $index => $image) {
            $data[$index]['imageUrls'] = $image->getFullUrl();
            $data[$index]['id'] = $image->id;
        }
      
        return $this->sendResponse($data, 'img retrieved');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function imageDelete($id)
    {
        $media = Media::whereId($id)->firstorFail();
        $media->delete();

        return $this->sendResponse($media, 'Image Delete successfully');
    }

    public function getVideoByUrl(Request $request)
    {
        $url = $request->videoUrl;
        if ($url == null) {
            return $this->sendError('Please enter video URL');
        }
        $embed = OEmbed::get($url);
        if (empty($embed)) {
            return $this->sendError('Something wrong occurred please try again');
        }

        $embedData = [];
        $embedData['embed_url'] = $embed->src();
        $embedData['html'] = $embed->html(['width' => 280, 'height' => 250]);
        $embedData['thumbnail_url'] = $embed->thumbnail()['url'];

        return $this->sendResponse($embedData, 'Data retried');
    }

    public function bulkPost()
    {
        return view('bulk_post.index');
    }

    public function idsList()
    {
        $lang = Language::with('Categories.subCategories')->get();

        $html = view('bulk_post.ids-data', compact('lang'))->render();

        return $this->sendResponse($html, 'Data retried');
    }

    public function documentation()
    {
        $html = view('bulk_post.documentation')->render();

        return $this->sendResponse($html, 'Data retried');
    }

    public function export()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Hardik',
                'email' => 'hardik@gmail.com',
            ],
        ];

        return Excel::download(new BulkPostExport($users), 'csv_template.csv');
    }

    public function bulkPostStore(CreateBulkPostRequest $request): Redirector|Application|RedirectResponse
    {

        $input = $request->all();

        $validation = Validator::make($input, [
            'bulk_post' => 'required',
        ]);
        $this->errors = $validation->messages();
        if (!$validation->passes()) {
            Flash::error('Please enter CSV files.');
        }
        if ($validation->passes()) {
            $excel = Excel::import(new BulkPostImport, $request->file('bulk_post'), null, \Maatwebsite\Excel\Excel::CSV);
            Flash::success('Bulk Post created successfully.');
        }


        return redirect(route('bulk-post-index'));
    }
    public function openAi(OpenAIRequest $request)
    {
       $input = $request->all();
        $client = new \GuzzleHttp\Client();

        $data = \Illuminate\Support\Facades\Http::withToken(config('services.open_ai.open_ai_key'))
            ->withHeaders([
                'Content-Type' => 'application/json'
            ])
            ->post('https://api.openai.com/v1/completions', [
                'model' => $input['openAiModel'],
                'prompt' => $input['postTitle'],
                "temperature" => (float)$input['Temperature'],
                "max_tokens"=> (int)$input['MaximumLength'],
                "top_p" => (float)$input['InputTopPId'],
            ]);
        if(isset($data->json()['error']) ){
            return $this->sendError($data->json()['error']['message']);
        }else{
            $text = $data->json()['choices'][0]['text'];
            return $this->sendResponse($text, 'Content Generated successfully.');
        }
    }
}
