<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';
    protected $primaryKey = 'todo_id';
    protected $fillable = ['user_id', 'title', 'description', 'due_date', 'status'];
    public $timestamps = false; 

    public function user() {
        return $this->belongsTo(User::class);
    }
}
