<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DefaultAdPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'name' => 'manage_ad',
            'display_name' => 'Manage Ad',
        ];
        $permission = Permission::create($permissions);

        /** @var Role $adminRole */
        $adminRole = Role::whereName('admin')->first();

        if (isset($adminRole)) {
            $staffPermission = Permission::whereIn('name', ['manage_ad'])->pluck('name', 'id');
            $adminRole->givePermissionTo($staffPermission);
        }
    }
}
