<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Models\Language;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlbumController extends AppBaseController
{
    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('album.index', compact('languages'));
    }

    /**
     * @param  CreateAlbumRequest  $request
     * @return mixed
     */
    public function store(CreateAlbumRequest $request)
    {
        $input = $request->all();

        Album::create($input);

        return $this->sendSuccess('Album created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Album  $album
     * @return JsonResponse
     */
    public function edit(Album $album)
    {
        return $this->sendResponse($album, 'Album retrieve successfully.');
    }

    /**
     * @param  UpdateAlbumRequest  $request
     * @param  Album  $album
     * @return mixed
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $input = $request->all();
        $album->update($input);

        return $this->sendSuccess('Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Album  $album
     * @return JsonResponse
     */
    public function destroy(Album $album)
    {
        $gallery = $album->gallery()->count();
        $subAlbum = $album->albumCategory()->count();
        if (! empty($gallery || $subAlbum)) {
            return $this->sendError('This Album is in use');
        }
        $album->delete();

        return $this->sendSuccess('Album deleted successfully.');
    }
}
