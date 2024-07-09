<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckInController;
use \App\Http\Controllers\GardenController;
use \App\Http\Controllers\ShopController;
use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\MineController;
use App\Http\Controllers\CraftPotionController;


Route::get('', [HomeController::class, 'index'])->name('welcome');

Route::middleware('Unauthorized')->group(function () {

    Route::get('dang-nhap', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('dang-nhap', [AuthController::class, 'login']);

    Route::get('/dang-nhap/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/login_google/callback', [AuthController::class, 'handleGoogleCallback']);

});

Route::middleware(['Authorization', 'throttle:40,1'])->group(function () {

    Route::get('/bao-danh-hang-ngay', [CheckInController::class, 'index'])->name('checkin');

    Route::get('/duoc-dien', [GardenController::class, 'index'])->name('garden');

    Route::get('/thuong-hoi', [ShopController::class, 'index'])->name('shop');

    Route::get('/tai-khoan', [AccountController::class, 'index'])->name('account');

    Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

    Route::get('/mo-nguyen-thach', [MineController::class, 'index'])->name('mine_cave');

    Route::get('/phong-luyen-dan', [CraftPotionController::class, 'index'])->name('craft_potion');

});
