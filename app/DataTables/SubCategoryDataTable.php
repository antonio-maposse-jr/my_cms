<?php

namespace App\DataTables;

use App\Models\SubCategory;

/**
 * Class SubCategoryDataTable
 */
class SubCategoryDataTable
{
    /**
     * @return SubCategory
     */
    public function get()
    {
        /** @var SubCategory $query */
        $query = SubCategory::with('language', 'category')->get();

        return $query;
    }
}
