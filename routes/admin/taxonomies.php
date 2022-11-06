<?php

use App\Http\Controllers\Admin\TaxonomyController;

Route::group(['prefix' => 'taxonomies', 'as' => 'taxonomies.'], function () {
    Route::get('/', [TaxonomyController::class, 'index'])->name('index');
    Route::post('create', [TaxonomyController::class, 'createTaxonomy'])->name('create');
    Route::get('{id}/edit', [TaxonomyController::class, 'editTaxonomy'])->name('edit');
    Route::put('{id}/update', [TaxonomyController::class, 'updateTaxonomy'])->name('update');
    Route::post('{id}/taxon', [TaxonomyController::class, 'ajaxCreate'])->name('taxons.create.ajax');
});

Route::group(['prefix' => 'taxons', 'as' => 'taxons.'], function () {
    Route::post('create', [TaxonomyController::class, 'create'])->name('create');
    Route::get('{id}/edit', [TaxonomyController::class, 'editTaxon'])->name('edit');
    Route::put('{id}/update', [TaxonomyController::class, 'updateTaxon'])->name('update');
    Route::get('{id}/delete', [TaxonomyController::class, 'deleteTaxon'])->name('delete');
});
