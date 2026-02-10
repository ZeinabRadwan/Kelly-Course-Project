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
        Schema::table('quiz_responses', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id'); // Add the course_id column
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade'); // Foreign key constraint (optional but recommended)
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quiz_responses', function (Blueprint $table) {
            //
        });
    }
};
