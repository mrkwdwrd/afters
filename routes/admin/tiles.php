<?php

use App\Http\Controllers\Admin\TileController;

Route::group(['prefix' => 'tiles', 'as' => 'tiles.'], function () {
    Route::get('/', [TileController::class, 'index'])->name('index');
    Route::post('/', [TileController::class, 'create'])->name('create');
    Route::get('{id}/edit', [TileController::class, 'edit'])->name('edit');
    Route::post('{id}', [TileController::class, 'update'])->name('update');
    Route::get('{id}/delete', [TileController::class, 'delete'])->name('delete');
});
