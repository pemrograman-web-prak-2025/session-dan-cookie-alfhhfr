<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    use HasFactory;

    protected $table = 'moods';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'mood',
        'note',
        'mood_date',
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
