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
        Schema::create('candidate_answers', function (Blueprint $table) {
           $table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->foreignId('exam_id')->constrained()->onDelete('cascade');
$table->foreignId('exam_attempt_id')->constrained('exam_attempts')->onDelete('cascade');
$table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
$table->text('answer')->nullable();
$table->boolean('is_correct')->default(false);
$table->integer('marks_awarded')->default(0);
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_answers');
    }
};
