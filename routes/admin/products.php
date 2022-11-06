<?php

use App\Http\Controllers\Admin\ProductController;

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'create'])->name('create');
    Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('{id}', [ProductController::class, 'update'])->name('update');
    Route::get('{id}/delete', [ProductController::class, 'delete'])->name('delete');
    Route::post('{id}/sort_images', [ProductController::class, 'sortMedia'])->name('sort_images');
    Route::delete('delete_media', [ProductController::class, 'deleteMedia'])->name('delete_media');
    Route::group(['prefix' => '{id}/media', 'as' => 'media.'], function () {
        Route::post('/', [ProductController::class, 'createMedia'])->name('create');
    });

    Route::post("add_specification", [ProductController::class, 'addSpecificationBlade'])->name('add_specification');
    Route::post('specifications/create', [ProductController::class, 'createSpec'])->name('createSpec');
});
