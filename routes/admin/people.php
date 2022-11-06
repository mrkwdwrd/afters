<?php

use App\Http\Controllers\Admin\PeopleController;

Route::group(['prefix' => 'people', 'as' => 'people.'], function () {
    Route::get('/', [PeopleController::class, 'index'])->name('index');
    Route::post('/', [PeopleController::class, 'create'])->name('create');
    Route::get('{id}/edit', [PeopleController::class, 'edit'])->name('edit');
    Route::put('{id}', [PeopleController::class, 'update'])->name('update');
    // Route::delete('{id}', [PeopleController::class, 'destroy'])->name('destroy');
    Route::get('{id}/delete', [PeopleController::class, 'delete'])->name('delete');
    Route::post('{id}/image', [PeopleController::class, 'addImage'])->name('image.add');
    Route::delete('{id}/image/{image}', [PeopleController::class, 'deleteImage'])->name('image.delete');
    Route::get('{id}/deactivate', [PeopleController::class, 'deactivate'])->name('deactivate');
    Route::get('{id}/activate', [PeopleController::class, 'activate'])->name('activate');
    Route::post('sort-order', [PeopleController::class, 'sortOrder'])->name('sort-order');
});
