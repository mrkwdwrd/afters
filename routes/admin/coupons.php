<?php

use App\Http\Controllers\Admin\CouponController;

Route::group(['prefix' => 'coupons', 'as' => 'coupons.'], function () {
    Route::get("/", [CouponController::class, 'index'])->name('index');
    Route::post("create", [CouponController::class, 'create'])->name('create');
    Route::get("{id}/edit", [CouponController::class, 'edit'])->name('edit');
    Route::put("{id}/update", [CouponController::class, 'update'])->name('update');
    Route::get("{id}/delete", [CouponController::class, 'delete'])->name('delete');

    Route::group(['prefix' => '{id}/users', 'as' => 'users.'], function () {
        Route::get("{user}/delete", [CouponController::class, 'deleteUser'])->name('delete');
    });
});
