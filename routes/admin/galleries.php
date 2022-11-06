<?php

use App\Http\Controllers\Admin\CmsGalleryController;

Route::group(['prefix' => 'galleries', 'as' => 'galleries.'], function () {
    Route::get('/', [CmsGalleryController::class, 'index'])->name('index');
    Route::post('/', [CmsGalleryController::class, 'create'])->name('create');
    Route::get('{id}/edit', [CmsGalleryController::class, 'edit'])->name('edit');
    Route::put('{id}', [CmsGalleryController::class, 'update'])->name('update');
    // Route::delete('{id}', [CmsGalleryController::class, 'destroy'])->name('destroy');
    Route::get('{id}/delete', [CmsGalleryController::class, 'delete'])->name('delete');
    Route::group(['prefix' => '/{id}/media', 'as' => 'media.'], function () {
        Route::post('/', [CmsGalleryController::class, 'createMedia'])->name('create');
        Route::post('sort', [CmsGalleryController::class, 'sort'])->name('sort');
    });
});
