<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistLoginController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 登録+ログイン
Route::post('/register', [RegistLoginController::class, 'register']);
Route::post('/login', [RegistLoginController::class, 'login']);

// 監理画面での操作
Route::middleware('auth')->group(function () {
    
});

// テスト: checkをadminに変更してmiddleware内へ
Route::get('/check', [AdminController::class, 'show']);
Route::get('/check/search', [AdminController::class, 'search']);
Route::delete('/check/delete', [AdminController::class, 'destroy']);



// お問い合わせフォーム
Route::get('/index', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/confirm', [ContactController::class, 'store']);
