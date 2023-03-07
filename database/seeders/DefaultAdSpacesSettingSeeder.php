<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DefaultAdSpacesSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['key' => 'header', 'value' => '1']);
        Setting::create(['key' => 'index_top', 'value' => '1']);
        Setting::create(['key' => 'index_bottom', 'value' => '1']);
        Setting::create(['key' => 'post_details', 'value' => '1']);
        Setting::create(['key' => 'details_side', 'value' => '1']);
        Setting::create(['key' => 'categories', 'value' => '1']);
        Setting::create(['key' => 'trending_post', 'value' => '1']);
        Setting::create(['key' => 'popular_news', 'value' => '1']);
        Setting::create(['key' => 'trending_post_index_page', 'value' => '1']);
        Setting::create(['key' => 'popular_news_index_page', 'value' => '1']);
        Setting::create(['key' => 'recommended_post_index_page', 'value' => '1']);
    }
}
