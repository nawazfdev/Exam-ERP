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
    Schema::table('candidate_answers', function (Blueprint $table) {
        $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
        $table->foreignId('exam_id')->after('user_id')->constrained()->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_answers', function (Blueprint $table) {
            //
        });
    }
};
