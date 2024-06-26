<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckInController;
use \App\Http\Controllers\GardenController;
use \App\Http\Controllers\ShopController;
use \App\Http\Controllers\AccountController;


Route::get('', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('Unauthorized')->group(function () {
    Route::get('dang-nhap', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('dang-nhap', [AuthController::class, 'login']);

    Route::get('/dang-nhap/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/login_google/callback', [AuthController::class, 'handleGoogleCallback']);
});

Route::middleware('Authorization')->group(function () {
    Route::get('/diem-danh-hang-ngay', [CheckInController::class, 'index']);
    Route::post('/diem-danh-hang-ngay', [CheckInController::class, 'checkIn'])->name('checkin');

    Route::get('/duoc-dien', [GardenController::class, 'index'])->name('garden');
    Route::post('/gieo-linh-duoc', [GardenController::class, 'grow'])->name('grow');
    Route::post('/thu-hoach', [GardenController::class, 'harvest'])->name('harvest');

    Route::get('/thuong-hoi', [ShopController::class, 'index'])->name('shop');

    Route::get('/tai-khoan', [AccountController::class, 'index'])->name('account');

    Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
});
