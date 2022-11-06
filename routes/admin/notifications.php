<?php

use App\Http\Controllers\Admin\NotificationController;

Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::post('create', [NotificationController::class, 'create'])->name('create');
    Route::get('{id}/edit', [NotificationController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [NotificationController::class, 'update'])->name('update');
    // Route::delete('{id}', [NotificationController::class, 'destroy'])->name('destroy');
    Route::get('{id}/delete', [NotificationController::class, 'delete'])->name('delete');
});
