<?php

use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Product\ProductController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ApplicationController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/product-details/{slug}', [ApplicationController::class, 'productDetails'])->name('product-details');

Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');

    Route::get('/category/add', [CategoryController::class, 'create'])->name('create-category');
    Route::post('/category/add', [CategoryController::class, 'store'])->name('store-category');


    Route::get('/product', [ProductController::class, 'index'])->name('product');

    Route::get('/product/add', [ProductController::class, 'create'])->name('create-product');
    Route::post('/product/add', [ProductController::class, 'store'])->name('store-product');
});
