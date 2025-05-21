<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->foreignId('organization_id')->constrained('organizations')->onDelete('cascade'); // Ensure candidates belong to an organization
            $table->foreignId('candidate_group_id')->nullable()->constrained('candidate_groups')->onDelete('set null');
            $table->string('mobile', 20)->nullable();
            $table->string('national_id', 50)->nullable()->unique();
            $table->string('reference_id', 50)->nullable()->unique();
            $table->enum('special_needs', ['enable', 'disable'])->default('disable');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // User who created the candidate
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
