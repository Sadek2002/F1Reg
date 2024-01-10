<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LeaderboardController;

Route::get('leaderboard', function () {
    $race = \App\Models\race::find(1);
    return view('leaderboard', compact(['race',]));
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// profiles
Route::resource('profiles', ProfileController::class);

// homepage
Route::resource('homepage', HomepageController::class);

//Leaderboard






















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
