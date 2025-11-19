<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. All routes
| are loaded by the RouteServiceProvider and all of them will be assigned
| to the "web" middleware group.
|
*/
// Home page - show all products and categories
Route::get('/', [ProductController::class, 'showHome'])->name('home');

// Category routes
Route::get('/category', [CategoryController::class, 'mygetdata'])->name('getdata'); // list categories
Route::post('/category', [CategoryController::class, 'store'])->name('store'); // create category

// Product routes
Route::get('/product', [ProductController::class, 'showProduct'])->name('productadminpage'); // list products
Route::post('/product', [ProductController::class, 'store'])->name('CreateProduct'); // create product