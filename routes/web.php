<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\MainController as MainController;
use App\Http\Controllers\CartController as CartController;

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
Auth::routes();
// Route::get('/home', [HomeController::class, 'index'])->name('home');
