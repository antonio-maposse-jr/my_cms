<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Navigation;
use Illuminate\Database\Seeder;

class DefaultCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Animal',
                'slug' => 'animal',
                'show_in_menu' => 1,
                'show_in_home_page' => 1,
                'color' => '#b51cb2',
                'lang_id' => 1,
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'show_in_menu' => 1,
                'show_in_home_page' => 0,
                'color' => '#2bc3a9',
                'lang_id' => 1,
            ],
            [
                'name' => 'Music',
                'slug' => 'music',
                'show_in_menu' => 0,
                'show_in_home_page' => 1,
                'color' => '#d514a5',
                'lang_id' => 2,
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'show_in_menu' => 0,
                'show_in_home_page' => 0,
                'color' => '#2a10ac',
                'lang_id' => 2,
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'show_in_menu' => 1,
                'show_in_home_page' => 1,
                'color' => '#5c1030',
                'lang_id' => 1,
            ],

        ];
        foreach ($categories as $category) {
            $categoryId = Category::create($category);

            $navigation = Navigation::query()->first();
            if ($navigation == null) {
                $navigationOrder = 1;
            } else {
                $navigationLast = Navigation::query()->orderBy('order_id', 'desc')->first();
                $navigationOrder = $navigationLast['order_id'] + 1;
            }

            Navigation::create([
                'navigationable_type' => Category::class,
                'navigationable_id' => $categoryId['id'],
                'order_id' => $navigationOrder,
            ]);
        }
    }
}
