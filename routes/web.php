<?php

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

Route::get('/yaps/{yap}', [YapController::class, 'show'])->name('yaps.show');

Route::post('/yaps', [YapController::class, 'store'])->name('yaps.create');

Route::get('/yaps/{yap}/edit', [YapController::class, 'edit'])->name('yaps.edit');

Route::put('/yaps/{yap}/edit', [YapController::class, 'update'])->name('yaps.update');

Route::delete('/yaps/{yap}', [YapController::class, 'destroy'])->name('yaps.destroy');

Route::get('/profile', [ProfileController::class, 'index']);
