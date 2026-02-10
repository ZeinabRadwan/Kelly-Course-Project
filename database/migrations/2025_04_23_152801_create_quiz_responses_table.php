<?php

// database/migrations/xxxx_xx_xx_create_quiz_responses_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Assumes you have a users table
            $table->foreignId('question_id')->constrained()->onDelete('cascade');  // Assumes you have a questions table
            $table->string('answer');  // Store the user's answer
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_responses');
    }
}

