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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('duration');
            $table->string('organization_id');
            $table->string('candidate_group_id');
            $table->enum('question_picking', ['auto', 'manual']);
            $table->enum('availability', ['always', 'specific_time']);
            $table->boolean('display_countdown')->default(false);
            $table->boolean('submit_before_end')->default(false);
            
            // Settings
            $table->enum('negative_marks', ['none', 'apply', '10%'])->default('none');
            $table->boolean('allow_partial_marks')->default(false);
            $table->boolean('allow_question_navigation')->default(false);
            $table->boolean('allow_section_navigation')->default(false);
            $table->boolean('allow_review')->default(false);
            $table->boolean('allow_feedback_after_exam')->default(false);
            $table->boolean('display_results')->default(false);
            $table->boolean('display_results_after_expiry')->default(false);
            $table->boolean('display_ranking')->default(false);
            $table->boolean('allow_pause_resume')->default(false);
            $table->boolean('allow_download_paper')->default(false);
            $table->boolean('system_check')->default(false);
            $table->boolean('allow_retake')->default(false);
            $table->integer('retake_count')->nullable();
            
            // Security
            $table->boolean('proctoring')->default(false);
            $table->boolean('terminate_on_unusual_behavior')->default(false);
            $table->boolean('live_chat_support')->default(false);
            $table->boolean('force_fullscreen')->default(false);
            
            // Pricing
            $table->decimal('exam_price', 10, 2)->default(0.00);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
