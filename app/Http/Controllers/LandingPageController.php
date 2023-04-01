<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Emoji;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\PostReactionEmoji;
use App\Models\PremiumDocuments;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Scopes\LanguageScope;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends AppBaseController
{
    /**
     * @return Application
     */
    public function index()
    {
        //Header

        $data['sliderPosts'] = Post::with('category', 'user')->withCount('comment')
            ->orderBy('created_at', 'desc')
            ->whereSlider(1)->whereVisibility(Post::VISIBILITY_ACTIVE)
            ->get();

        $data['categories'] = Category::with('posts', 'posts.user')
            ->whereHas('posts', function ($q) {
                return $q->where('visibility', Post::VISIBILITY_ACTIVE);
            })->whereShowInHomePage(1)->get();
        $headlinePosts = Post::with('category', 'user')->whereVisibility(Post::VISIBILITY_ACTIVE)->where('show_on_headline', 1);
        $data['firstHeadlinePost'] = $headlinePosts->first();
        $data['headlinePosts'] = $headlinePosts->latest()->take(4)->get();
        $data['breakingPosts'] = $headlinePosts->skip(1)->take(3)->get();
        $featurePosts = Post::with('category', 'user')->where('featured', 1)->whereVisibility(Post::VISIBILITY_ACTIVE);
        $data['firstFeaturePost'] = $featurePosts->first();
        $data['topStoryPosts'] = Post::with('category', 'user')->where('recommended', 1)->whereVisibility(Post::VISIBILITY_ACTIVE)
            ->orderBy('id', 'desc')->take(4)->get();
        $data['latestPosts'] = Post::with('user', 'category')->whereVisibility(Post::VISIBILITY_ACTIVE)->orderBy('created_at', 'desc')->take(4)->get();
        $data['postCategory'] = Category::whereHas('posts', function ($q) {
            return $q->where('visibility', Post::VISIBILITY_ACTIVE)->where('show_on_headline', 1);
        })->where('show_in_home_page', 1)->latest()->take(4)->get();
        $data['featurePostCategory'] = Category::whereHas('posts', function ($q) {
            return $q->where('visibility', Post::VISIBILITY_ACTIVE)->where('featured', '=', 1);
        })->where('show_in_home_page', 1)->latest()->take(4)->get();

        $data['getTrendingPosts'] = getTrendingPost();
        $data['getPopulerCategories'] = getPopulerCategories();
        $data['getPopularNews'] = getPopularNews();
        $data['getRecommendedPost'] = getRecommendedPost();
        $data['getPopularTags'] = getPopularTags();
        $data['getPoll'] = getPoll();
        $data['getOption'] = getOption();

        return view('front_new.home')->with($data);
    }

    public function semanario(){

        $pdfDoc = PremiumDocuments::where('Type', 'SEMANARIO')->orderBy('created_at', 'desc')->first();
        if (Auth::check()) {
            $user = Auth::user()->subscription;
            if($user==null){
             return redirect()->route('login');
            }
            return view('front_new.semanario', compact('pdfDoc'));
        }
        return redirect()->route('login');
    }

    public function diario(){

        $pdfDoc = PremiumDocuments::where('Type', 'DIARIO')->orderBy('created_at', 'desc')->first();
        if (Auth::check()) {
            $user = Auth::user()->subscription;
            if($user==null){
             return redirect()->route('login');
            }
            return view('front_new.semanario', compact('pdfDoc'));
        }
        return redirect()->route('login');
    }
    /**
     * @param  Request  $request
     * @param $slug
     * @param  null  $id
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function detailPage(Request $request, $slug, $id = null)
    {
        if (! empty(getLogInUser())) {
            $langId = Post::withoutGlobalScope(LanguageScope::class)->whereSlug($slug)->first();
            if (! empty($langId['lang_id'])) {
                session(['frontLanguageChange' => $langId['lang_id']]);
            }
        }

        if (!empty($request->ajax())) {
            session(['frontLanguageChange' => $request->data]);

            return $this->sendSuccess('Language change successFully');
        }

        $post = Post::with(['category', 'postArticle', 'postVideo', 'postAudios', 'postGalleries', 'postSortLists.media', 'postSortLists', 'media', 'rssFeed',
        ])->where('slug', $slug)->whereVisibility(Post::VISIBILITY_ACTIVE)->firstOrFail();

        $data['showCaptcha'] = Setting::where('key', 'show_captcha')->first()->value;
        $post = (! empty($post) ? $post : null);

        $previous = Post::where('id', '<', $post->id)->whereVisibility(Post::VISIBILITY_ACTIVE)->max('id');
        $next = Post::where('id', '>', $post->id)->whereVisibility(Post::VISIBILITY_ACTIVE)->min('id');

        if (empty($previous)) {
            $previous = Post::where('id', '>', $post->id)->whereVisibility(Post::VISIBILITY_ACTIVE)->max('id');
        }

        if (empty($next)) {
            $next = Post::where('id', '<', $post->id)->whereVisibility(Post::VISIBILITY_ACTIVE)->min('id');
        }

        $data['previousPost'] = Post::with('postVideo')->find($previous);

        $data['nextPost'] = Post::with('postVideo')->find($next);

        $data['comments'] = Comment::with('users')->wherePostId($post->id)->where('status', 1)->latest()->get();
        $data['totalComments'] = $data['comments']->count();
        $data['relatedPosts'] = Post::with('category', 'postVideo')->where('id', '!=', $post->id)->where('category_id',
            $post->category_id)->where('post_types',
            $post->post_types)->whereVisibility(Post::VISIBILITY_ACTIVE)->get();
        $data['countEmoji'] = PostReactionEmoji::wherePostId($post->id)->get()->groupBy('emoji_id');
        $data['emojis'] = Emoji::whereStatus(Emoji::ACTIVE)->get();
        if (! empty($post->post_types)) {
            if ($post->post_types == Post::ARTICLE_TYPE_ACTIVE || $post->post_types == Post::OPEN_AI_ACTIVE) {
                $data['postDetail'] = $post;

                return view('front_new.detail_pages.article-details')->with($data);
            } elseif ($post->post_types == Post::GALLERY_TYPE_ACTIVE) {
                $data['postDetail'] = $post;
                $data['fileName'] = $data['postDetail']->getPostFileNameAttribute();
                $data['firstGalleryPost'] = $data['postDetail']->postGalleries->first();
                $data['lastGalleryPost'] = $data['postDetail']->postGalleries->last();
                $data['totalGalleryPost'] = count($data['postDetail']->postGalleries);
                if ((! empty($id)) && ($id > $data['totalGalleryPost'] || $id <= 0)) {
                    return redirect(route('detailPage', ['data' => $slug]));
                }
                $data['galleryPost'] = (! empty($id)) ? $data['postDetail']->postGalleries[$id - 1]
                    : $data['postDetail']->postGalleries->first();
                $data['galleryPostNo'] = (! empty($id)) ? $id : '1';

                return view('front_new.detail_pages.gallery-details')->with($data);
            } elseif ($post->post_types == Post::SORTED_TYPE_ACTIVE) {
                $data['postDetail'] = $post;

                return view('front_new.detail_pages.sortedlist-details')->with($data);
            } elseif ($post->post_types == Post::VIDEO_TYPE_ACTIVE) {
                $data['postDetail'] = $post;

                return view('front_new.detail_pages.video-details')->with($data);
            } elseif ($post->post_types == Post::AUDIO_TYPE_ACTIVE) {
                $data['postDetail'] = $post;

                return view('front_new.detail_pages.audio-details')->with($data);
            } else {
                return redirect(route('front.home'));
            }
        } else {
            return redirect(route('front.home'));
        }
    }

    /**
     * @param $slug
     * @return Application
     */

    /**
     * @param $slug
     * @return Application
     */

    /**
     * @param $slug
     * @param $id
     * @return Application
     */

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function saveSubscribeUser(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email:filter|email|unique:subscribers,email',
            ],
            [
                'email.unique' => 'This email is already subscribed',
            ]
        );

        Subscriber::create($request->all());

        return $this->sendSuccess('Subscribed successfully');
    }

    public function saveCommentsUser(CreateCommentRequest $request)
    {
        if ((getSettingValue()['show_captcha'] == '1') && $request['g-recaptcha-response'] == null) {
            return $this->sendError('reCAPTCHA required!');
        }
        $input = $request->all();
        if (Auth::check()) {
            $input['name'] = getLogInUser()->full_name;
            $input['email'] = getLogInUser()->email;
        }
        $input['status'] = (getSettingValue()['comment_approved'] == 1) ? 1 : 0;
        $comment = Comment::create($input);
        $data['commentCount'] = Comment::where('status', 1)->where('post_id', $comment->post_id)->count();
        $data['commentView'] = Comment::with('users')->find($comment->id);
        $data['commentCreated'] = $data['commentView']->created_at->diffForHumans();

        return $this->sendResponse($data, 'Comment create successfully');
    }

    /**
     * @param  Comment  $comment
     * @return mixed
     */
    public function destroyComment(Comment $comment)
    {
        $comment->delete();

        $data['commentCount'] = Comment::whereStatus(1)->wherePostId($comment->post_id)->get()->count();

        return $this->sendResponse($data['commentCount'], 'Comment deleted successfully');
    }

    /**
     * @param $slug
     * @param  null  $subName
     * @return string
     */
    public function categoryPage($slug, $subName = null)
    {
        $categoryName = Category::where('slug', $slug)->first();
        if ($categoryName == null) {
            return redirect(route('front.home'));
        }
        if (! $categoryName->show_in_menu) {
            return redirect(route('front.home'));
        }

        $categoryName = $categoryName->name;

        if (! empty($subName)) {
            $subCategory = SubCategory::where('slug', $subName)->first();
            if (! empty($subCategory)) {
                if (! $subCategory->show_in_menu) {
                    return redirect(route('front.home'));
                }
            } else {
                return redirect(route('front.home'));
            }

            $subCategory = $subCategory->name;

            return view('front_new.category-page', compact('slug', 'categoryName', 'subCategory', 'subName'));
        } else {
            return view('front_new.category-page', compact('categoryName', 'slug'));
        }
    }

    /**
     * @param $tagName
     * @return Application|Factory|View
     */
    public function popularTagPage($tagName)
    {
        return view('front_new.popular-tag', compact('tagName'));
    }

    /**
     * @param  null  $id
     * @return Application|View
     */
    public function galleryPage($id = null)
    {
        if (! empty($id)) {
            $allSubCategory = AlbumCategory::with('album', 'gallery')->whereLangId(getFrontSelectLanguage())
                ->where('album_id', $id)->get();
            $galleryImages = Gallery::with('album', 'media', 'category')->whereLangId(getFrontSelectLanguage())
                ->where('album_id', $id)->get();

            return view('front_new.gallery-images', compact('galleryImages', 'allSubCategory'));
        }

        $album = Album::with('gallery')->whereLangId(getFrontSelectLanguage())->get();
        $galleries = [];
        foreach ($album as $gallery) {
            if (! empty($gallery->gallery->first())) {
                $galleries[] = $gallery->gallery->first();
            }
        }

        return view('front_new.gallery-page', compact('galleries'));
    }

    /**
     * @return Application|Factory|View
     */
    public function allPosts()
    {
        return view('front_new.all-posts');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function displayTerms(Request $request)
    {
        $settings = getSettingValue();
        if ($request->is('terms-conditions')) {
            $term = 'terms-conditions';
            $termData = $settings['terms&conditions'];
        } elseif ($request->is('support')) {
            $term = 'support';
            $termData = $settings['support'];
        } elseif ($request->is('privacy')) {
            $term = 'privacy';
            $termData = $settings['privacy'];
        } else {
            return redirect('/');
        }

        return view('front_new.page', compact('termData', 'term'));
    }

    public function audioDetails(Request $request)
    {
        $audioPost = [];
        $audioPost['data'] = Post::with(['postAudios', 'media'])->where('slug', $request->audio_slug)->whereVisibility(Post::VISIBILITY_ACTIVE)->firstOrFail();
        $audioPost['audioData'] = $audioPost['data'];
        $lists = [];

        foreach ($audioPost['audioData']->postAudios->media as $data) {
            $list = [];
            $list['name'] = $data['name'];
            $list['url'] = $data->getFullUrl();
            $list['cover_art_url'] = $audioPost['audioData']->media[0]->getFullUrl();
            $lists[] = $list;
        }
        $audioPost['list'] = $lists;

        return $this->sendResponse($audioPost, 'Data retried');
    }

    public function postReaction(Request $request)
    {
        $existemoji = PostReactionEmoji::wherePostId($request['postId'])->whereIpAddress(\Request::ip())->first();
        if ($existemoji == null) {
            $postReaction = PostReactionEmoji::create([
                'ip_address' => \Request::ip(),
                'emoji_id'   => $request['emojiId'],
                'post_id'    => $request['postId'],
            ]);
        } else {
            if ($existemoji->emoji_id == $request['emojiId']) {
                $existemoji->delete();
            }
        }
        $countEmoji = PostReactionEmoji::wherePostId($request['postId'])->get()->groupBy('emoji_id');

        return $this->sendResponse($countEmoji, 'Data retried');
    }
    public function declineCookie(){
        session(['declined' => 1]);
    }
}
