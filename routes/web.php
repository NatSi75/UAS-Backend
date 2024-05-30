<?php
use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EditorController::class,'index']);