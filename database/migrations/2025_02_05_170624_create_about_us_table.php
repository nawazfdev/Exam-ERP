<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Section title (e.g., "About Us")
            $table->string('feature_image');
            $table->text('description'); // Main about us description
            $table->timestamps();
        });

        Schema::create('about_us_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_us_id')->constrained('about_us')->onDelete('cascade');
            $table->string('heading'); // Subsection heading (e.g., "Petro Chemical Plants")
            $table->text('content'); // Subsection content
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_us_items');
        Schema::dropIfExists('about_us');
    }
};
