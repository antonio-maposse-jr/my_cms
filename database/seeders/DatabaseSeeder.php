<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DefaultUserSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(DefaultPermissionSeeder::class);
        $this->call(DefaultRoleSeeder::class);
        $this->call(DefaultLanguageSeeder::class);
        $this->call(DefaultMailSettingSeeder::class);
        $this->call(DefaultSeoToolSeeder::class);
        $this->call(DefaultCategorySeeder::class);
        $this->call(DefaultSubCategorySeeder::class);
        $this->call(DefaultMenuSeeder::class);
        $this->call(DefaultPageSeeder::class);
        $this->call(DefaultPostSeeder::class);
    }
}
