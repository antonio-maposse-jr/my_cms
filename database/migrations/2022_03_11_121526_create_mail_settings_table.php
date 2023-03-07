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
        Schema::create('mail_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('mail_protocol');
            $table->string('mail_library');
            $table->string('encryption');
            $table->integer('mail_port');
            $table->string('mail_host');
            $table->string('mail_username');
            $table->string('mail_password');
            $table->string('mail_title');
            $table->string('reply_to');
            $table->integer('email_verification');
            $table->integer('contact_messages')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('send_mail')->nullable();
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
        Schema::dropIfExists('mail_settings');
    }
};
