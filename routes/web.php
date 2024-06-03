<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/**

 *   MVC - Model View Controller
 *   Controller : Handle all the requests
 *   Model : Handle data logic and interactions with database
 *   View : What should be shown to the user

 */
Route::get('/', [DashboardController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);
