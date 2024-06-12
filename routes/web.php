<?php
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UpdateController;
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

Route::get('/login', function() {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/create-article', function() {
    return view('createArticle');
});
Route::post('/create-article', [ArticleController::class, 'createArticle']);

Route::get('/search', [articleController::class, 'search']);

Route::get('/update-profile', function() {
    return view('updateProfile');
});
Route::put('/update-profile', [UpdateController::class, 'updateProfile']);

Route::get('/change-password', function() {
    return view('changePassword');
});
Route::patch('/change-password', [EditorController::class, 'changePassword']);

Route::get('/update-article', function() {
    return view('update-article');
});
Route::put('/update-article', [ArticleController::class, 'update']);




