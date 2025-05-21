<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_primary_logo');
            $table->string('site_favicon');
            $table->string('timezone');
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('skype_link')->nullable();
            $table->string('email');
            $table->string('fax')->nullable();
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->text('address');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_copyright')->nullable();
            $table->string('meta_author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
