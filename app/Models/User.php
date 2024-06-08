<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticable
{
    use HasFactory, Notifiable;

    protected $fillable = ['username', 'email', 'phone_number', 'password'];

    
}