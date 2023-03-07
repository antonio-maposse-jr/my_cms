<?php

namespace App\DataTables;

use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class LanguageDataTable
 */
class LanguageDataTable
{
    /**
     * @return Builder
     */
    public function get(): Builder
    {
        /** @var Language $query */
        return Language::query()->select('languages.*');
    }
}
