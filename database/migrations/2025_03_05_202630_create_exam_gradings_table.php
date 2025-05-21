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
        Schema::create('exam_gradings', function (Blueprint $table) {
            $table->foreignId('exam_id')
                  ->constrained()   // Assumes there is an `exams` table
                  ->onDelete('cascade');  // Ensures related exam_gradings are deleted when an exam is deleted
            $table->string('exam_type'); // To define the type of exam (grading, pass_fail, good_excellent)
            $table->string('grade')->nullable(); // For grading (A, B, C, etc.)
            $table->integer('min_score')->nullable();
            $table->integer('max_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_gradings');
    }
};
