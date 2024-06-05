<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\YapController;
use Illuminate\Support\Facades\Route;

/**

 *  MVC - Model View Controller
 *  Model : Handle data logic and interactions with database
 *  View : What should be shown to the user
 *  Controller : Handle all the requests
 *
 *

 */
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'yaps/', 'as' => 'yaps.',], function () {

    // Route::get('/{yap}', [YapController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {
        // Route::post('', [YapController::class, 'store'])->name('store');
        // Route::get('/{yap}/edit', [YapController::class, 'edit'])->name('edit');
        // Route::put('/{yap}/edit', [YapController::class, 'update'])->name('update');
        // Route::delete('/{yap}', [YapController::class, 'destroy'])->name('destroy');

        // Route::post('/{yap}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::resource('yaps', YapController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('yaps', YapController::class)->only(['show']);
Route::resource('yaps.comments', CommentController::class)->only(['store'])->middleware('auth');
// ->except(['index', 'create', 'show'])->middleware('auth')

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
