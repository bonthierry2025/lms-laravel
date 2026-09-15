<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->string('question');
            $table->text('description')->nullable();
            $table->enum('type', ['multiple_choice', 'true_false', 'short_answer', 'essay']);
            $table->integer('points')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index('quiz_id');
            $table->index('order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
};
