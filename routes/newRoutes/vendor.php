<?php

use App\Http\Controllers\Client\DashboardController as DashboardController;
use App\Http\Controllers\Client\ProductController as ProductController;

Route::group(['middleware' => ['vendor-auth', 'verified'], 'prefix' => 'vendor'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('vendor.dashboard');
    Route::resource('/product', ProductController::class);
});
