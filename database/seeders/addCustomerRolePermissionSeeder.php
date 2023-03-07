<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class addCustomerRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'customer',
                'display_name' => 'Customer',
                'is_default' => true,
            ],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
