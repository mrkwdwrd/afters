<?php

use App\Http\Controllers\admin\MediaReleaseController;

Route::group(['prefix' => 'media-releases', 'as' => 'media-releases.'], function () {
    Route::get('/', [MediaReleaseController::class, 'index'])->name('index');
    Route::post('create', [MediaReleaseController::class, 'create'])->name('create');
    Route::get('{id}/edit', [MediaReleaseController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [MediaReleaseController::class, 'update'])->name('update');
    Route::delete('{id}', [MediaReleaseController::class, 'destroy'])->name('destroy');
});
