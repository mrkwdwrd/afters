<?php

use App\Http\Controllers\Admin\VariantController;

Route::group(['prefix' => 'variants', 'as' => 'variants.'], function () {
    Route::post('/', [VariantController::class, 'create'])->name('create');
    Route::get('/{id}/deactivate', [VariantController::class, 'deactivate'])->name('deactivate');
    Route::get('/{id}/reactivate', [VariantController::class, 'reactivate'])->name('reactivate');
    Route::get('/{id}/delete', [VariantController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [VariantController::class, 'edit'])->name('edit');
    Route::put('/{id}', [VariantController::class, 'update'])->name('update');
});
