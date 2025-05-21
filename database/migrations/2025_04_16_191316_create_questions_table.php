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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade'); // Foreign key to exams table
            $table->string('question_type');
            $table->text('question_text');
            $table->text('correct_option'); // Store correct answer or option
            $table->json('options')->nullable(); // Store options as JSON for MCQ type
            $table->text('explanation')->nullable(); // Explanation is optional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
