<?php

namespace Database\Seeders;

use App\Models\AdSpaces;
use App\Models\Currency;
use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EmojiPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'name'         => 'manage_emoji',
            'display_name' => 'Manage Emoji',
        ];
        $permission = Permission::create($permissions);

        /** @var Role $adminRole */
        $adminRole = Role::whereName('admin')->first();

        if (isset($adminRole)) {
            $adminPermission = Permission::whereIn('name', ['manage_emoji'])->pluck('name', 'id');
            $adminRole->givePermissionTo($adminPermission);
        }

    }
}
