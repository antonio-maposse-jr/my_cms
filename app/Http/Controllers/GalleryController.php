<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class GalleryController extends AppBaseController
{
    /** @var GalleryRepository */
    public $galleryRepository;

    /**
     * @param  GalleryRepository  $galleryRepo
     */
    public function __construct(GalleryRepository $galleryRepo)
    {
        $this->galleryRepository = $galleryRepo;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('gallery.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $albums = Album::pluck('name', 'id')->toArray();
        $categories = AlbumCategory::pluck('name', 'id')->toArray();

        return view('gallery.create', compact('albums', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateGalleryRequest $request)
    {
        $input = $request->all();
        $this->galleryRepository->store($input);

        Flash::success('Gallery Image Created successfully.');

        return redirect(route('gallery-images.index'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $gallery = Gallery::whereId($id)->firstorFail();

        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGalleryRequest  $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateGalleryRequest $request, $id)
    {
        $input = $request->all();

        $this->galleryRepository->updateGallery($input, $id);

        Flash::success('Gallery Image Updated successfully.');

        return redirect(route('gallery-images.index'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $image = Gallery::whereId($id)->delete();

        return $this->sendSuccess('Gallery Image Deleted successfully.');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function getAlbums(Request $request)
    {
        $langId = $request->get('langId');
        $albums = getAlbums($langId);

        return $this->sendResponse($albums, 'Albums retrieved successfully');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function getCategory(Request $request)
    {
        $albumId = $request->get('albumId');
        $langId = $request->get('langId');
        $categories = getAlbumCategory($albumId, $langId);

        return $this->sendResponse($categories, 'Albums retrieved successfully');
    }
}
