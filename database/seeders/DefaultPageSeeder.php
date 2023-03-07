<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class DefaultPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name' => 'Olympics',
                'title' => 'Upcoming olympics',
                'slug' => 'upcoming-olympics',
                'meta_title' => 'Everything about next olympics',
                'meta_description' => 'Read about where and when will the next winter olympics be held ??',
                'location' => 2,
                'Visibility' => 1,
                'show_title' => 0,
                'show_right_column' => 1,
                'show_breadcrumb' => 0,
                'permission' => 1,
                'content' => "<p>The 2022 Beijing Winter Olympics will be spread over three distinct zones and merge new venues with existing ones from the 2008 Games, including the Bird's Nest stadium.</p>

<p>With 100 days to go, AFP Sport takes an in-depth look at where the Olympics will take place:</p>

<p>Beijing - The 80,000-seater Bird's Nest National Stadium -- whose cross-hatched steel girders produce a nest-like appearance -- will stage the opening and closing ceremony.</p>

<p>sting Olympic Park is a 12,000-capacity speed skating oval nicknamed the Ice Ribbon.</p>

<p>New venues have been built in other parts of the city, such as the striking location for some of the skiing and snowboarding events.</p>

<p>The 60-metre-high Big Air jumping platform stands in the shadow of four vast cooling towers at a former steel mill that once employed tens of thousands of workers and is now a trendy bar, restaurant and office complex. </p>
    </p>",
                'lang_id' => 1,
                'parent_menu_link' => 2,
            ],
            [
                'name' => 'future of gaming',
                'title' => 'technology used in gaming',
                'slug' => 'technology-used-in-gaming',
                'meta_title' => 'Usage of new technology in gaming',
                'meta_description' => 'Which new technology used in gaming Read now !!',
                'location' => 4,
                'Visibility' => 1,
                'show_title' => 1,
                'show_right_column' => 0,
                'show_breadcrumb' => 1,
                'permission' => 1,
                'content' => '22032022.jpg',
                'lang_id' => 2,
                'parent_menu_link' => 3,
            ],
        ];
        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
