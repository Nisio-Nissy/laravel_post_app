<?php

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;
Route::get('/', function(){
    return view('dashboard');
});

// ホーム
 Route::get('/dashboard', [HomeController::class, 'index'])
    ->name('index')
    ->middleware('auth');

// ログイン表示
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login'); 

// ログイン
Route::post('/login', [AuthController::class, 'login']); 


// ログアウト
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout'); 

// 新規登録
Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

//ユーザー専用ホーム
Route::get('/user/home',[PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('user.home');

//投稿
Route::resource('posts', PostController::class)->middleware('auth');

// タグ検索結果
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
