<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Emoji;
use App\Models\Navigation;
use Illuminate\Database\Seeder;

class DefaultEmojiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emojiDelete = Emoji::query()->delete();
        $emojis = [
               [
                   'emoji' => '&#128077;',
                   'name' => 'like',
                   'status' => true,
               ],
               [
                   'emoji' => '&#128078;',
                   'name' => 'dislike',
                   'status' => true,
               ],
               [
                   'emoji' => '&#128525;',
                   'name' => 'love',
                   'status' => true,
               ],
               [
                   'emoji' => '&#128545;',
                   'name' => 'angry',
                   'status' => true,
               ],
               [
                   'emoji' => '&#128557;',
                   'name' => 'sad',
                   'status' => true,
               ],
               [
                   'emoji' => '&#128514;',
                   'name' => 'funny',
                   'status' => true,
               ],
               [
                   'emoji' => '&#128561;',
                   'name' => 'wow',
                   'status' => true,
               ],
               [
                   'emoji' => '&#128591;',
                   'name' => 'pray',
                   'status' => false,
               ],
               [
                   'emoji' => '&#128076;',
                   'name' => 'super',
                   'status' => false,
               ],
           ];
        foreach ($emojis as $emoji) {
           Emoji::create($emoji);
        }
    }
}
