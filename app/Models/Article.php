<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = ['title', 'body', 'category', 'image', 'editor', 'user_id'];

    //fungsi untuk mendefinisikan hubungan antara tabel articles dengan users
    public function user()
    {
        //Mengindikasikan bahwa dalam tabel articles ada kolom yang menunjukkan ID user yang terkait 
        return $this->belongsTo(User::class);
    }
}