<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\GardenController;
use \App\Http\Controllers\MineController;
use \App\Http\Controllers\CraftPotionController;

/*
 * throttle:20,1 (accepted 20 request API in 1 min)
 */
Route::middleware(['Authorization', 'throttle:20,1'])->prefix('v1')->group(function () {

    Route::post('/diem-danh-hang-ngay', [CheckInController::class, 'checkIn']);

    Route::post('/mua-huy-hieu', [ShopController::class, 'buyBadge']);
    Route::post('/ban-huy-hieu', [ShopController::class, 'sellBadge']);
    Route::post('/mua-vat-pham', [ShopController::class, 'buyItem']);
    Route::post('/ban-vat-pham', [ShopController::class, 'sellItem']);

    Route::post('/gieo-linh-duoc', [GardenController::class, 'grow'])->name('grow');
    Route::post('/thu-hoach', [GardenController::class, 'harvest'])->name('harvest');

    Route::post('/khai-thac-nguyen-thach', [MineController::class, 'mine'])->name('mine');

    Route::post('/luyen-dan-duoc', [CraftPotionController::class, 'craft'])->name('craft_potion.craft');
    Route::post('/nhan-dan-duoc', [CraftPotionController::class, 'collect'])->name('craft_potion.collect');
});
