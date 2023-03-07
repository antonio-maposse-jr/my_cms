<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $emojis = [
            [
                'emoji' => '👍',
                'name' => 'Like',
                'status' => 1,
            ], 
            [
                'emoji' => '👎',
                'name' => 'Dislike',
                'status' => 1,
            ], 
            [
                'emoji' => '😂',
                'name' => 'Funny',
                'status' => 1,
            ], 
            [
                'emoji' => '😍',
                'name' => 'Love',
                'status' => 1,
            ], 
            [
                'emoji' => '😡',
                'name' => 'Angry',
                'status' => 1,
            ], 
            [
                'emoji' => '😢',
                'name' => 'Sad',
                'status' => 1,
            ], 
            [
                'emoji' => '😮',
                'name' => 'Wow',
                'status' => 1,
            ], 
        ];

        foreach ($emojis as $emoji) {
             \App\Models\Emoji::create($emoji);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
