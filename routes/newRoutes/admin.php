<?php

use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\SliderController as SliderController;
use App\Http\Controllers\Admin\SizeController as SizeController;
use App\Http\Controllers\Admin\VendorController as VendorController;

Route::group(['middleware' => ['admin-auth', 'verified'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/slider', SliderController::class);
    Route::resource('/product-size', SizeController::class);

    // Pending vendors
    Route::get('/pending-vendors', [VendorController::class, 'pendingVendorIndex'])->name('pendingVendorIndex');
    Route::get('/vendor-approval/{id}', [VendorController::class, 'approveVendor'])->name('approveVendor');
    Route::get('/reject-approval/{id}', [VendorController::class, 'rejectVendor'])->name('rejectVendor');

    // Approved vendors
    Route::get('/approved-vendors', [VendorController::class, 'approvedVendorIndex'])->name('approvedVendorIndex');
});
