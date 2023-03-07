<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DefaultRoleSeeder extends Seeder
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
                'name' => 'admin',
                'display_name' => 'Admin',
                'is_default' => true,
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'is_default' => true,
            ],
            [
                'name' => 'moderator',
                'display_name' => 'Moderator',
                'is_default' => true,
            ],
            [
                'name' => 'author',
                'display_name' => 'Author',
                'is_default' => true,
            ],
            [
                'name' => 'user',
                'display_name' => 'User',
                'is_default' => true,
            ],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        /** @var Role $adminRole */
        $adminRole = Role::whereName('admin')->first();

        /** @var Role $staffRole */
        $staffRole = Role::whereName('staff')->first();

        /** @var Role $moderatorRole */
        $moderatorRole = Role::whereName('moderator')->first();

        /** @var Role $authorRole */
        $authorRole = Role::whereName('author')->first();

        /** @var Role $userRole */
        $userRole = Role::whereName('user')->first();

        /** @var User $user */
        $user = User::whereEmail('admin@infynews.com')->first();

        $allPermission = Permission::pluck('name', 'id');
        $adminRole->givePermissionTo($allPermission);
        if ($user) {
            $user->assignRole($adminRole);
        }

        $staffPermission = Permission::whereIn('name', [
            'manage_all_post', 'manage_categories', 'manage_sub_categories',
            'manage_albums', 'manage_albums_category', 'manage_gallery_image', 'manage_polls',
        ])->pluck('name', 'id');

        $staffRole->givePermissionTo($staffPermission);

        $moderator = Permission::whereIn('name', [
            'manage_categories', 'manage_albums_category', 'manage_gallery',
            'manage_pages', 'manage_all_post',
        ])->pluck('name', 'id');

        $moderatorRole->givePermissionTo($moderator);

        $author = Permission::where('name', 'manage_rss_feeds')->pluck('name', 'id');

        $authorRole->givePermissionTo($author);

        $userPermission = Permission::where('name', 'manage_all_post')->pluck('name', 'id');

        $userRole->givePermissionTo($userPermission);
    }
}
