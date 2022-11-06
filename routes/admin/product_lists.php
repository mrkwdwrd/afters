<?php

use App\Http\Controllers\Admin\ProductListController;

Route::group(['prefix' => 'product-lists', 'as' => 'product-lists.'], function () {
    Route::get('/', [ProductListController::class, 'index'])->name('list');
    Route::post('/', [ProductListController::class, 'create'])->name('create');
    Route::get('{id}/edit', [ProductListController::class, 'edit'])->name('edit');
    Route::put('{id}/update', [ProductListController::class, 'update'])->name('update');
    // Route::delete('{id}', [ProductListController::class, 'destroy'])->name('destroy');
    Route::get('{id}/delete', [ProductListController::class, 'delete'])->name('delete');
    Route::post('sort', [ProductListController::class, 'sort'])->name('sort');
});
