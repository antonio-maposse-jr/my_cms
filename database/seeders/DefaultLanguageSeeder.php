<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class DefaultLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'name' => 'English',
                'iso_code' => 'en',
                'is_default' => true,
            ],
            [
                'name' => 'Arabic',
                'iso_code' => 'ar',
                'is_default' => false,

            ],
            [
                'name' => 'Chinese',
                'iso_code' => 'zh',
                'is_default' => false,
            ],
            [
                'name' => 'Spanish',
                'iso_code' => 'es',
                'is_default' => false,
            ],
            [
                'name' => 'German',
                'iso_code' => 'de',
                'is_default' => false,
            ],
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
