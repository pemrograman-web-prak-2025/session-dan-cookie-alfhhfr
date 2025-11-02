<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'email', 'password'];
    protected $hidden = ['password'];

    public function todos() { return $this->hasMany(Todo::class, 'user_id'); }
    public function moods() { return $this->hasMany(Mood::class, 'user_id'); }
}
