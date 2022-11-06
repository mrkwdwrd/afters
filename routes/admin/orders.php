<?php

use App\Http\Controllers\Admin\OrderController;

Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('{id}/edit', [OrderController::class, 'edit'])->name('edit');
    Route::put('{id}', [OrderController::class, 'update'])->name('update');
    Route::get('{id}/cancelled', [OrderController::class, 'orderCancelled'])->name('cancelled');
    Route::get('{id}/refunded', [OrderController::class, 'orderRefunded'])->name('refunded');
    Route::get('{id}/shipped', [OrderController::class, 'orderShipped'])->name('shipped');
});
