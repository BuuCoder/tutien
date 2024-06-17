<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('/login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/login_google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('home', function () {
        return view('home');
    })->name('home');
});
