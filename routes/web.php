<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::middleware(['auth'])->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/novo/post', 'create')->name('newPost-get');
        Route::post('/novo/post', 'store')->name('newPost-post');
        Route::get('/atualiza/post/{post}', 'edit')->name('post-edit');
        Route::put('/atualiza/post/{post}', 'update')->name('post-update');
        Route::delete('/atualiza/post/{post}', 'destroy')->name('post-destroy');
        Route::get('/exibir/post/{post}', 'show')->name('post-show');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('/exibir/post/{post}', 'store')->name('comment-post');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login-post');
    Route::delete('/logout', 'logout')->name('logout');

    Route::get('/senha/recuperar', 'forgotPassword')->name('password.request');
    Route::post('/senha/recuperar', 'passwordRecover')->name('password.email');

    Route::get('/senha/regerar/{token}', 'passwordReset')->name('password.reset');
    Route::post('/senha/regerar', 'passwordRegenerate')->name('password.update');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/novo/usuario', 'create')->name('new-user-get');
    Route::post('/novo/usuario', 'store')->name('new-user-post');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('authGoogle');

Route::get('/auth/callback', [SocialiteController::class, 'store']);
