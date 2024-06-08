<?php
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [ArticleController::class, 'home']);

Route::get('/filter', [ArticleController::class, 'filter']);

Route::get('/detail-article', [ArticleController::class, 'detail']);

Route::get('/profile', [EditorController::class,'profile']);

Route::get('/delete-article', [ArticleController::class, 'delete']);

Route::get('/register', function() {
    return view('register');
});

Route::post('/register', [EditorController::class, 'register']);


//Belum
Route::get('/login', function() {
    return view('login');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/create-article', function() {
    return view('createArticle');
});

Route::get('/update-article', function() {
    return view('updateArticle');
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

Route::get('/update-article', [ArticleController::class, 'update']);
Route::post('/login', [AuthController::class, 'login']);
Route::patch('/change-password', [EditorController::class, 'changePassword']);
Route::put('/update-profile', [EditorController::class, 'updateProfile']);
Route::post('/create-article', [EditorController::class, 'create']);
