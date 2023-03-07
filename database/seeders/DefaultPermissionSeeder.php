<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DefaultPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'manage_menu',
                'display_name' => 'Manage Menu',
            ],
            [
                'name' => 'manage_categories',
                'display_name' => 'Manage Categories',
            ],
            [
                'name' => 'manage_sub_categories',
                'display_name' => 'Manage Sub Categories',
            ],
            [
                'name' => 'manage_albums',
                'display_name' => 'Manage Albums',
            ],
            [
                'name' => 'manage_albums_category',
                'display_name' => 'Manage Albums Category',
            ],
            [
                'name' => 'manage_gallery',
                'display_name' => 'Manage Gallery',
            ],
            [
                'name' => 'manage_pages',
                'display_name' => 'Manage Pages',
            ],
            [
                'name' => 'manage_settings',
                'display_name' => 'Manage Settings',
            ],
            [
                'name' => 'manage_staff',
                'display_name' => 'Manage Staff',
            ],
            [
                'name' => 'manage_roles_permission',
                'display_name' => 'Manage Roles Permission',
            ],
            [
                'name' => 'manage_add_post',
                'display_name' => 'Manage Add Post ',
            ],
            [
                'name' => 'manage_all_post',
                'display_name' => 'Manage All Post',

            ],
            [
                'name' => 'manage_rss_feeds',
                'display_name' => 'Manage Rss Feeds',

            ],
            [
                'name' => 'manage_mail_setting',
                'display_name' => 'Manage Mail Setting',
            ],
            [
                'name' => 'manage_polls',
                'display_name' => 'Manage polls',
            ],
            [
                'name' => 'manage_all_user_can_vote',
                'display_name' => 'Manage All User Can Vote',
            ],
            [
                'name' => 'manage_only_register_user_vote',
                'display_name' => 'Manage Only Register User Vote',
            ],
            [
                'name' => 'manage_gallery_image',
                'display_name' => 'Manage Gallery Image',
            ],
            [
                'name' => 'manage_language',
                'display_name' => 'Manage Language',
            ],
            [
                'name' => 'manage_navigation',
                'display_name' => 'Manage Navigation',
            ],
            [
                'name' => 'manage_seo_tools',
                'display_name' => 'Manage SEO Tools',
            ],
            [
                'name' => 'manage_news_letter',
                'display_name' => 'Manage News Letter',
            ],
            [
                'name' => 'manage_comment',
                'display_name' => 'Manage Comment',
            ],
            [
                'name' => 'manage_contacts',
                'display_name' => 'Manage Contacts',
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
