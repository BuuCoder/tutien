<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckInController;

Route::middleware('auth:api')->group(function () {
    Route::get('/bao-danh-hang-ngay', [CheckInController::class, 'index']);
    Route::post('/bao-danh-hang-ngay', [CheckInController::class, 'checkIn'])->name('checkin');
});
