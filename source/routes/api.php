<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::middleware(['Authorization', 'throttle:1,1'])->prefix('v1')->group(function () {
    Route::post('/mua-huy-hieu', [ShopController::class, 'buyBadge']);
    Route::post('/ban-huy-hieu', [ShopController::class, 'sellBadge']);
    Route::post('/mua-vat-pham', [ShopController::class, 'buyItem']);
    Route::post('/ban-vat-pham', [ShopController::class, 'sellItem']);
});
