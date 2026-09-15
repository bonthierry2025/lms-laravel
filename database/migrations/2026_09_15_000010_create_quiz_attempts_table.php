<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->integer('score')->nullable();
            $table->integer('total_points')->default(0);
            $table->decimal('percentage', 5, 2)->nullable();
            $table->boolean('is_passed')->nullable();
            $table->timestamp('started_at');
            $table->timestamp('completed_at')->nullable();
            $table->integer('time_spent_minutes')->default(0);
            $table->timestamps();

            $table->index('user_id');
            $table->index('quiz_id');
            $table->index('is_passed');
            $table->unique(['user_id', 'quiz_id', 'started_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_attempts');
    }
};
