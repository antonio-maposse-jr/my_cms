<?php

namespace App\DataTables;

use App\Models\AlbumCategory;

/**
 * Class StaffDataTable
 */
class AlbumCategoryDataTable
{
    /*
     *
     */
    public function get()
    {
        $query = AlbumCategory::with('language', 'album')->get();

        return $query;
    }
}
