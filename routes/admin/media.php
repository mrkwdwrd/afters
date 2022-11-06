<?php

use App\Http\Controllers\Admin\MediaController;

Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
    Route::get('/', [MediaController::class, 'index'])->name('index');
    Route::post('/', [MediaController::class, 'store'])->name('store');
    Route::delete('{id}', [MediaController::class, 'destroy'])->name('destroy');
    Route::post('order', [MediaController::class, 'sortOrder'])->name('sort');
});
