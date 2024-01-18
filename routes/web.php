<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::view('/admin', 'admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// profiles
Route::resource('users', UserController::class);

// results
Route::resource('results', ResultController::class);

// homepage
Route::resource('homepage', HomepageController::class);
