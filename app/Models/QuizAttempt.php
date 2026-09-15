<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'total_points',
        'percentage',
        'is_passed',
        'started_at',
        'completed_at',
        'time_spent_minutes',
    ];

    protected $casts = [
        'is_passed' => 'boolean',
        'started_at' => 'timestamp',
        'completed_at' => 'timestamp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
