<?php

use App\Http\Controllers\Admin\CmsSliderController;

Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
    Route::get('/', [CmsSliderController::class, 'index'])->name('index');
    Route::post('/', [CmsSliderController::class, 'create'])->name('create');
    Route::get('{id}/edit', [CmsSliderController::class, 'edit'])->name('edit');
    Route::put('{id}', [CmsSliderController::class, 'update'])->name('update');
    Route::get('{id}/delete', [CmsSliderController::class, 'delete'])->name('delete');
    Route::group(['prefix' => '/{id}/slides', 'as' => 'slides.'], function () {
        Route::post('/', [CmsSliderController::class, 'createSlide'])->name('create');
        Route::post('sort', [CmsSliderController::class, 'sort'])->name('sort');
    });
});
