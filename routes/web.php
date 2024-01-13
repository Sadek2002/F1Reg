<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// profiles
Route::resource('profiles', ProfileController::class);

// homepage
Route::resource('homepage', HomepageController::class);

// Leaderboards Routes
Route::get('{id}/leaderboard', [App\Http\Controllers\LeaderboardController::class, 'races'])->name('leaderboard');
Route::get('leaderboards', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboards');

















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
