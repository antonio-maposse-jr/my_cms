<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\ImageUploadReuest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Models\User;
use App\Repositories\PageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PageController extends AppBaseController
{
    /** @var pagefRepository */
    private $PageRepository;

    public function __construct(PageRepository $PageRepository)
    {
        $this->PageRepository = $PageRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return view('page.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $images = getLogInUser()->getMedia(User::NEWS_IMAGE);
        $imageUrls = [];
        foreach ($images as $image) {
            $imageUrls[] = $image->getFullUrl();
        }

        return view('page.create', compact('imageUrls'));
    }

    /**
     * @param  CreatePageRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();

        $this->PageRepository->store($input);

        Flash::success('Page created successfully.');

        return redirect(route('pages.index'));
    }

    /**
     * @param    $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
    }

    /**
     * @param  Page  $page
     * @return Application|Factory|View
     */
    public function edit(Page $page)
    {
        return view('page.edit', compact('page'));
    }

    /**
     * @param  UpdatePageRequest  $request
     * @param  Page  $page
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $this->PageRepository->update($request->all(), $page->id);

        Flash::success('Page updated successfully.');

        return redirect(route('pages.index'));
    }

    /**
     * @param  Page  $page
     * @return mixed
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return $this->sendSuccess('Page deleted successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function visibility(Request $request)
    {
        $page = Page::find($request->data);

        $page->visibility = ($page->visibility == 0) ? '1' : '0';

        $page->save();

        return $this->sendSuccess('Visibility updated successfully.');
    }

    public function imgUpload(ImageUploadReuest $request)
    {
        $input = $request->all();
        $user = getLogInUser();

        $imageCheck = Media::where('collection_name', User::NEWS_IMAGE)->where('file_name',
            $input['image']->getClientOriginalName())->exists();

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
     * @return JsonResponse
     */
    public function imageGet()
    {
        /** @var User $user */
        $user = getLogInUser();
        $images = $user->getMedia(User::NEWS_IMAGE);
        $data = [];
        foreach ($images as $index => $image) {
            $data[$index]['imageUrls'] = $image->getFullUrl();
            $data[$index]['id'] = $image->id;
        }

        return $this->sendResponse($data, 'img retrieved');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function imageDelete($id)
    {
        $media = Media::whereId($id)->firstorFail();
        $media->delete();

        return $this->sendResponse($media, 'Image Delete successfully');
    }

    /**
     * @param $pageSlug
     * @return Application|Factory|View|RedirectResponse
     */
    public function showPageSlug($pageSlug)
    {
        $page = Page::whereVisibility(1)->whereSlug($pageSlug)->first();
        if (empty($page)) {
            return redirect(route('front.home'));
        }

        return view('front_new.page-slug', compact('page'));
    }
}
