<?php

namespace Database\Seeders;

use App\Models\AdSpaces;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DefaultAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = [
            [
                'ad_spaces' => AdSpaces::HEADER,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_TOP,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_TOP,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_BOTTOM,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_BOTTOM,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::POST_DETAILS,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::POST_DETAILS,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::ALL_DETAILS_SIDE,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::CATEGORIES,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::CATEGORIES,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::ALL_DETAILS_TRENDING_POST,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::ALL_DETAILS_TRENDING_POST,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::ALL_DETAILS_POPULAR_NEWS,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::ALL_DETAILS_POPULAR_NEWS,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_TRENDING_POST,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_TRENDING_POST,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_POPULAR_NEWS,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_POPULAR_NEWS,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_RECOMMENDED_POST,
                'ad_view' => AdSpaces::DESKTOP,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],
            [
                'ad_spaces' => AdSpaces::INDEX_RECOMMENDED_POST,
                'ad_view' => AdSpaces::MOBILE,
                'ad_url' => 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839',
            ],

        ];
        foreach ($ads as $ad) {
            $postInputArray = Arr::only($ad, [
                'ad_spaces', 'ad_view', 'ad_url',
            ]);
            $newPost = AdSpaces::create($postInputArray);
        }
    }
}
