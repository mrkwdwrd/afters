<?php

use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\ShippingMethodController;
use App\Http\Controllers\Admin\ShippingItemController;

Route::group(['prefix' => 'shipping', 'as' => 'shipping.'], function () {
  Route::get('/', [ShippingController::class, 'index'])->name('index');

  Route::group(['prefix' => 'methods', 'as' => 'methods.'], function () {
    Route::post('/', [ShippingMethodController::class, 'create'])->name('create');
    Route::get('{id}/edit', [ShippingMethodController::class, 'edit'])->name('edit');
    Route::put('{id}', [ShippingMethodController::class, 'update'])->name('update');
    Route::get('{id}/delete', [ShippingMethodController::class, 'delete'])->name('delete');
  });

  Route::group(['prefix' => 'items', 'as' => 'items.'], function () {
    Route::post('/', [ShippingItemController::class, 'create'])->name('create');
    Route::get('{id}/edit', [ShippingItemController::class, 'edit'])->name('edit');
    Route::put('{id}', [ShippingItemController::class, 'update'])->name('update');
    Route::get('{id}/delete', [ShippingItemController::class, 'delete'])->name('delete');
    Route::get('{item}/methods/{method}/charges', [ShippingItemController::class, 'charges'])->name('charges');
    Route::put('{item}/methods/{method}/charges', [ShippingItemController::class, 'updateCharges'])->name('updateCharges');
  });
});
