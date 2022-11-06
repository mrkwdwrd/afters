<?php

use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/', [UserController::class, 'create'])->name('create');
    Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('{id}', [UserController::class, 'update'])->name('update');
    // Route::delete('{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('{id}/delete', [UserController::class, 'delete'])->name('delete');
    Route::get('{id}/reset', [UserController::class, 'sendPasswordReset'])->name('reset');
});
