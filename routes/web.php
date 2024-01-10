<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;

Route::get('{id}/meow', [App\Http\Controllers\LeaderboardController::class, 'mrow'])->name('meow');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// profiles
Route::resource('profiles', ProfileController::class);

// homepage
Route::resource('homepage', HomepageController::class);

//Leaderboard
Route::get('leaderboards', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboards');

















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
