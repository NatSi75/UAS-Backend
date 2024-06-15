<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Article;

class User extends Authenticable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['username', 'email', 'phone_number', 'password'];

    //Mendefinisikan relasi antara tabel users dengan articles.
    //Menggunakan method hasMany yang digunakan untuk mengidentifikasi bahwa satu user (users) dapat memiliki banyak artikel (articles)
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}