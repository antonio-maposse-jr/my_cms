<?php

namespace App\DataTables;

use App\Models\Album;

/**
 * Class StaffDataTable
 */
class AlbumDataTable
{
    /*
     *
     */
    public function get()
    {
        $query = Album::with('language')->get();

        return $query;
    }
}
