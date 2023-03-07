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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('keywords');
            $table->boolean('visibility');
            $table->boolean('featured');
            $table->boolean('breaking');
            $table->boolean('slider');
            $table->boolean('recommended');
            $table->boolean('show_on_headline');
            $table->boolean('show_registered_user');
            $table->string('optional_url')->nullable();
            $table->string('tags');
            $table->integer('post_types');
            $table->unsignedBigInteger('lang_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->integer('scheduled_post')->default(0);
            $table->timestamp('scheduled_post_time')->nullable();
            $table->boolean('status');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('lang_id')->references('id')
                ->on('languages')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('sub_category_id')->references('id')
                ->on('sub_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
