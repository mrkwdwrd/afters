<?php

use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogTagController;

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('index');
    Route::post('/', [BlogPostController::class, 'create'])->name('create');
    Route::get('{id}/edit', [BlogPostController::class, 'edit'])->name('edit');
    Route::put('{id}', [BlogPostController::class, 'update'])->name('update');
    Route::get('{id}/publish', [BlogPostController::class, 'publish'])->name('publish');
    Route::get('{id}/unpublish', [BlogPostController::class, 'unpublish'])->name('unpublish');
    // Route::delete('{id}', [BlogPostController::class, 'destroy'])->name('destroy');
    Route::get('{id}/delete', [BlogPostController::class, 'delete'])->name('delete');
    Route::get('{id}/restore', [BlogPostController::class, 'restore'])->name('restore');
    Route::post('{id}/image', [BlogPostController::class, 'addImage'])->name('image.add');
    Route::delete('{id}/image/{image}', [BlogPostController::class, 'deleteImage'])->name('image.delete');
    Route::get('{id}/tag/create', [BlogTagController::class, 'create'])->name('tag.create-tag');

    Route::post("{id}/create_node", [BlogPostController::class, 'createNode'])->name('create_node');
    Route::get("delete_node/{id}", [BlogPostController::class, 'deleteNode'])->name('delete_node');
    Route::post("sort-nodes", [BlogPostController::class, 'sortNodes'])->name('sort_nodes');
});
