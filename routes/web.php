<?php
use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [EditorController::class,'index']);
/* Route::get('/kategori/{kategori}', [EditorController::class,'index']);
Route::get('/search', [EditorController::class,'']);
Route::get('/article/{id}', [EditorController::class,'']);
Route::get('/article/{id}', [EditorController::class,'']); */
Route::get('/', function() {
    return view('home');
});

Route::get('/kategori', function() {
    return view('kategori');
});

Route::get('/register', function() {
    return view('register');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/create-article', function() {
    return view('createArticle');
});

Route::get('/detail-article', function() {
    return view('detailArticle');
});

Route::get('/update-article', function() {
    return view('updateArticle');
});

Route::get('/profile', function() {
    return view('profile');
});

Route::get('/search', function() {
    return view('search');
});

Route::get('/update-profile', function() {
    return view('updateProfile');
});

Route::get('/change-password', function() {
    return view('changePassword');
});

Route::post('/register', [EditorController::class, 'register']);
Route::post('/login', [EditorController::class, 'login']);
Route::patch('/change-password', [EditorController::class, 'changePassword']);
Route::put('/update-article', [EditorController::class, 'updateArticle']);
Route::put('/update-profile', [EditorController::class, 'updateProfile']);
Route::post('/create-article', [EditorController::class, 'createArticle']);
Route::delete('/delete-article', [EditorController::class, 'deleteArticle']);