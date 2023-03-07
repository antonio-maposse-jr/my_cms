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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->integer('location');
            $table->boolean('visibility');
            $table->boolean('show_title');
            $table->boolean('show_right_column');
            $table->boolean('show_breadcrumb');
            $table->boolean('permission');
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('parent_menu_link')->nullable();
            $table->unsignedBigInteger('lang_id');
            $table->timestamps();

            $table->foreign('parent_menu_link')->references('id')->on('menus')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('lang_id')->references('id')->on('languages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
