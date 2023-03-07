<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Navigation;
use Illuminate\Database\Seeder;

class DefaultMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'title' => 'Election',
                'link' => 'www.politicsinfo.com',
                'parent_menu_id' => null,
                'order' => 2,
                'show_in_menu' => 1,
            ],
            [
                'title' => 'Upcoming Sports',
                'link' => 'www.SportsDaily.com',
                'parent_menu_id' => 1,
                'order' => 1,
                'show_in_menu' => 1,
            ],
            [
                'title' => 'New Launches',
                'link' => 'www.MyGamez.com',
                'parent_menu_id' => 1,
                'order' => 3,
                'show_in_menu' => 0,
            ],

        ];

        foreach ($menus as $menu) {
            $menuId = Menu::create($menu);

            if (isset($menu['parent_menu_id'])) {
                $navigationOrder = Navigation::whereParentId($menu['parent_menu_id'])->count() + 1;
            } else {
                $navigationOrder = Navigation::whereNull('parent_id')->count() + 1;
            }

            Navigation::create([
                'navigationable_type' => Menu::class,
                'navigationable_id' => $menuId['id'],
                'order_id' => $navigationOrder,
                'parent_id' => $menu['parent_menu_id'] ?? null,
            ]);
        }
    }
}
