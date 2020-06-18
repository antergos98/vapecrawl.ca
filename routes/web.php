<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\VendorsController;
use Illuminate\Support\Facades\Route;

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

//Auth::routes();

Route::get('/', 'SearchController')->name('home');
Route::get('/search', 'SearchController')->name('search');
Route::view('/contact', 'contact')->name('contact');
Route::get('/vendors/{vendor:slug}', [VendorsController::class, 'show'])->name('vendors.show');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');

