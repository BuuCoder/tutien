<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckInController;

Route::middleware('Unauthorized')->group(function () {
    Route::get('dang-nhap', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('dang-nhap', [AuthController::class, 'login']);

    Route::get('/dang-nhap/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/login_google/callback', [AuthController::class, 'handleGoogleCallback']);
});

Route::middleware('Authorization')->group(function () {
    Route::get('', function () {
        return view('welcome');
    });

    Route::get('/diem-danh-hang-ngay', [CheckInController::class, 'index']);
    Route::post('/diem-danh-hang-ngay', [CheckInController::class, 'checkIn'])->name('checkin');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
