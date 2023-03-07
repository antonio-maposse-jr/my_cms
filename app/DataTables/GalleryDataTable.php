<?php

namespace App\DataTables;

use App\Models\Gallery;

/**
 * Class GalleryDataTable
 */
class GalleryDataTable
{
    public function get()
    {
        /** @var Gallery $query */
        $query = Gallery::with(['language:id,name', 'album:id,name', 'category:id,name']);

        return $query;
    }
}
