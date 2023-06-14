<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\MainController as MainController;
use App\Http\Controllers\CartController as CartController;
use App\Http\Controllers\Auth\Socialite\GoogleController as GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main UI pages
Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/restaurants', [MainController::class, 'showRestaurants'])->name('restaurant');
Route::get('/restaurant-detail/{vendorId}', [MainController::class, 'ShowRestaurantsDetail'])->name('restaurant.detail');

// For authentication
Auth::routes(['verify' => true]);
// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');

Route::get('job-dispatch', [MainController::class, 'dispatchJob']);

// Customer routes 

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart-items', [MainController::class, 'getActiveCartItems'])->name('cartItems');
    Route::post('/cart-checkout', [CartController::class, 'cartCheckout'])->name('checkout');
});


Route::get('/search', [MainController::class, 'searchRestaurant'])->name('search.restaurant');

Route::get('/test', function() {
    (new \App\Services\CartService())->cartTest();
});