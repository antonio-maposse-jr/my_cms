<?php

namespace App\DataTables;

use App\Models\Staff;
use App\Models\User;

/**
 * Class StaffDataTable
 */
class StaffDataTable
{
    /**
     * @return Staff
     */
    public function get()
    {
        /** @var Staff $query */
        $query = User::where('type', User::STAFF)->get();

        return $query;
    }
}
