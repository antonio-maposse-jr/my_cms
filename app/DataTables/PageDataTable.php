<?php

namespace App\DataTables;

use App\Models\Page;

/**
 * Class PageDataTable
 */
class PageDataTable
{
    /**
     * @return Page
     */
    public function get()
    {
        /** @var Page $query */
        $query = Page::with('language')->get();

        return $query;
    }
}
