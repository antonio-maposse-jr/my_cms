<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('post_count');
            $table->float('price');
            $table->unsignedBigInteger('currency_id');
            $table->integer('frequency');
            $table->integer('trial_days')->nullable();
            $table->boolean('is_default')->default(0);
            $table->timestamps();
            $table->foreign('currency_id')->references('id')->on('currencies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Artisan::call('db:seed', ['--class' => 'DefaultPlanSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'DefaultPlanPermissionSeeder', '--force' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
