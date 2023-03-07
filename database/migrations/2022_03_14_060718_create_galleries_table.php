<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_id');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('lang_id')->references('id')
                ->on('languages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('album_id')->references('id')
                ->on('albums')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('category_id')->references('id')
                ->on('album_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title', 160)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
