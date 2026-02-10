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
            $table->timestamp('taken_at')->nullable(); // Add the timestamp to track when the quiz was taken
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
