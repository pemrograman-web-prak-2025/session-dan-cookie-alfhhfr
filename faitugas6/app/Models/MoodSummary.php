<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoodSummary extends Model
{
    protected $table = 'mood_summary';
    protected $fillable = ['user_id', 'date', 'total_tasks', 'completed_tasks', 'average_mood'];
}
