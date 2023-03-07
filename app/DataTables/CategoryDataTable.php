<?php

namespace App\DataTables;

use App\Models\Category;

/**
 * Class CategoryDataTable
 */
class CategoryDataTable
{
    /**
     * @return Category
     */
    public function get()
    {
        /** @var Category $query */
        $query = Category::with('language')->get();

        return $query;
    }
}
