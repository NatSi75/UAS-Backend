<?php
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'home']);

Route::get('/filter', [ArticleController::class, 'filter']);

Route::get('/detail-article', [ArticleController::class, 'detail']);

Route::get('/profile', [EditorController::class,'profile']);

Route::get('/delete-article', [ArticleController::class, 'delete']);

// Menggunakan Middleware jika user sudah login 
Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', function() {
        return view('register');
    });

    Route::post('/register', [EditorController::class, 'register']);

    Route::get('/login', function() {
        return view('login');
    });
    
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/create-article', function() {
    return view('createArticle');
});
Route::post('/create-article', [ArticleController::class, 'createArticle']);

Route::post('/comment', [ArticleController::class, 'comment']);

Route::get('/search', [ArticleController::class, 'search']);

Route::get('/update-profile', function() {
    return view('updateProfile');
});
Route::put('/update-profile', [UpdateController::class, 'updateProfile'])->name('update-profile')->middleware('auth');

Route::get('/change-password', function() {
    return view('changePassword');
});
Route::patch('/change-password', [EditorController::class, 'changePassword']);

Route::get('/edit-article/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/update-article/{article}', [ArticleController::class, 'update'])->name('articles.update');

Route::get('/complaint-form', [UserController::class, 'complaint'])->name('complaint.edit');
Route::post('/submit-complaint', [UserController::class, 'storeComplaint'])->name('complaint.submit');

Route::post('/articles/like', [ArticleController::class, 'like'])->name('articles.like');
Route::post('/articles/unlike', [ArticleController::class, 'unlike'])->name('articles.unlike');



