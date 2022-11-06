<?php

use App\Http\Controllers\Admin\CmsNodeController;
use App\Http\Controllers\Admin\CmsPageController;

Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
    Route::get('/', [CmsPageController::class, 'index'])->name('index');
    Route::post('/', [CmsPageController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [CmsPageController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CmsPageController::class, 'update'])->name('update');
    Route::get('{id}/activate', [CmsPageController::class, 'activate'])->name('activate');
    // Route::delete('/{id}', [CmsPageController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/delete', [CmsPageController::class, 'delete'])->name('delete');
    Route::post('/{id}/image', [CmsPageController::class, 'addImage'])->name('images.add');
    Route::delete('/{id}/image/{image}', [CmsPageController::class, 'deleteImage'])->name('images.delete');
    Route::post('sort-order', [CmsPageController::class, 'sortOrder'])->name('sort-order');
});
Route::post('pages/{id}/nodes/create', [CmsNodeController::class, 'create'])->name('nodes.create');
Route::delete('nodes/{id}/remove', [CmsNodeController::class, 'delete'])->name('nodes.remove');
Route::post('nodes/sort-order', [CmsNodeController::class, 'sortOrder'])->name('nodes.sort-order');
