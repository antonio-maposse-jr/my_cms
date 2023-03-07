<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\RssFeed;
use App\Models\User;
use App\Repositories\DashboardRepository;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends AppBaseController
{
    /* @var DashboardRepository */
    private DashboardRepository $dashboardRepository;

    /**
     * DashboardController constructor.
     *
     * @param  DashboardRepository  $dashboardRepo
     */
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {

        $posts = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->count();
        $postsDraft = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->where('status', Post::STATUS_DRAFT)->count();
        $users = User::with('media')->where('type', 2)
            ->latest()->orderBy('id', 'desc')->take(5)->get();
        $rss = RssFeed::count();
        $rssPost = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->whereIsRss(true)->count();

        return view('dashboard.index', compact('posts', 'postsDraft', 'users', 'rss', 'rssPost'));
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getChart(Request $request)
    {
        $input = $request->all();
        $language = $this->dashboardRepository->updateChartRange($input);

        return $this->sendResponse($language, 'Chart updated Successfully');
    }
}
