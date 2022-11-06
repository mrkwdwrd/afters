<?php

use App\Http\Controllers\Admin\CmsAccordionController;

Route::group(['prefix' => 'accordions', 'as' => 'accordions.'], function () {
    Route::get('/', [CmsAccordionController::class, 'index'])->name('index');
    Route::post('/', [CmsAccordionController::class, 'create'])->name('create');
    Route::get('{id}/edit', [CmsAccordionController::class, 'edit'])->name('edit');
    Route::put('{id}', [CmsAccordionController::class, 'update'])->name('update');
    // Route::delete('{id}', [CmsAccordionController::class, 'destroy'])->name('destroy');
    Route::get('{id}/delete', [CmsAccordionController::class, 'delete'])->name('delete');
    Route::post('item_ajax_delete', [CmsAccordionController::class, 'deleteItemAjax'])->name('ajax_delete');
    Route::group(['prefix' => '/{id}/items', 'as' => 'items.'], function () {
        Route::post('/', [CmsAccordionController::class, 'createItem'])->name('create');
        Route::post('/sort', [CmsAccordionController::class, 'sort'])->name('sort');
        Route::get('/{item}/delete', [CmsAccordionController::class, 'deleteItem'])->name('delete');
    });
});
