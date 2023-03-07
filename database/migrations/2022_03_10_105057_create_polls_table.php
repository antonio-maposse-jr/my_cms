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
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_id');
            $table->string('question', 181);
            $table->string('option1', 181)->nullable();
            $table->string('option2', 181)->nullable();
            $table->string('option3', 181)->nullable();
            $table->string('option4', 181)->nullable();
            $table->string('option5', 181)->nullable();
            $table->string('option6', 181)->nullable();
            $table->string('option7', 181)->nullable();
            $table->string('option8', 181)->nullable();
            $table->string('option9', 181)->nullable();
            $table->string('option10', 181)->nullable();
            $table->integer('status')->default(0);
            $table->integer('vote_permission')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('polls');
    }
};
