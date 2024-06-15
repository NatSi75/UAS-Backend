<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Editors extends Authenticable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'editors';
    protected $fillable = ['username', 'email', 'phone_number', 'password'];
}
