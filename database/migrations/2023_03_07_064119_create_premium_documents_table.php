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
        Schema::create('premium_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nulable();
            $table->string('type');
            $table->longText('url')->nullable();
            $table->longText('iframe')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('lang_id');
            $table->timestamps();

            $table->foreign('created_by')->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('lang_id')->references('id')
            ->on('languages')
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
        Schema::dropIfExists('premium_documents');
    }
};
