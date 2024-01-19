<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomepageController::class, 'index']);

// Admin
Route::view('/admin', 'admin');

// Results
Route::resource('results', ResultController::class);

// Users
Route::resource('users', UserController::class)->names('users');

// Profiles
Route::get('/profiles/{user}', [ProfileController::class, 'show']);

// Routes that don't require authentication
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('homepage', HomepageController::class);

// Leaderboards
Route::get('{id}/leaderboard', [App\Http\Controllers\LeaderboardController::class, 'races'])->name('leaderboard');
Route::get('leaderboards', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboards');
Route::get('racescore', [App\Http\Controllers\LeaderboardController::class, 'searchRace'])->name('racescore');

// Manually define login route outside the authentication middleware
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
