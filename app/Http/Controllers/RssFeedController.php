<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRssFeedRequest;
use App\Http\Requests\UpdateRssFeedRequest;
use App\Models\Post;
use App\Models\RssFeed;
use App\Repositories\RssFeedRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class RssFeedController extends AppBaseController
{
    /**
     * @var RssFeedRepository
     */
    public RssFeedRepository $rssFeedRepo;

    /**
     * UserController constructor.
     *
     * @param  RssFeedRepository  $rssFeedRepository
     */
    public function __construct(RssFeedRepository $rssFeedRepository)
    {
        $this->rssFeedRepo = $rssFeedRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('rss_feed.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('rss_feed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRssFeedRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateRssFeedRequest $request)
    {
        $input = $request->all();

        $this->rssFeedRepo->store($input);

        Flash::success('RSS Feed Create successfully.');

        return redirect(route('rss-feed.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  RssFeed  $rssFeed
     * @return Application|Factory|View
     */
    public function edit(RssFeed $rssFeed)
    {
        return view('rss_feed.edit', compact('rssFeed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRssFeedRequest  $request
     * @param  RssFeed  $rssFeed
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateRssFeedRequest $request, RssFeed $rssFeed)
    {
        $input = $request->all();
        $this->rssFeedRepo->update($input, $rssFeed);
        Flash::success('RSS Feed Update successfully.');

        return redirect(route('rss-feed.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  RssFeed  $rssFeed
     * @return JsonResponse
     */
    public function destroy(RssFeed $rssFeed): JsonResponse
    {
        $post = Post::whereRssId($rssFeed->id);
        $post->delete();
        $rssFeed->delete();

        return $this->sendSuccess('Role deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  RssFeed  $rssFeed
     * @return JsonResponse
     */
    public function manuallyUpdate(RssFeed $rssFeed): JsonResponse
    {
        $this->rssFeedRepo->manuallyUpdate($rssFeed);

        return $this->sendSuccess('Feed updated successfully.');
    }
}
