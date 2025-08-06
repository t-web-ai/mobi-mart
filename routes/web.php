<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OrderListController;
use App\Http\Controllers\admin\ProductListController;
use App\Http\Controllers\admin\UserListController;
use App\Http\Middleware\admin\IsAdmin;
use App\Http\Middleware\admin\IsGuest;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware([IsGuest::class])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
});

Route::prefix('admin')->name('admin.')->middleware([IsAdmin::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/products', [ProductListController::class, 'index'])->name('products');
    Route::get('/users', [UserListController::class, 'index'])->name('users');
    Route::get('/sales', [OrderListController::class, 'sales'])->name('sales');
    Route::get('/popular', [OrderListController::class, 'popular'])->name('popular');
    Route::get('/orders', [OrderListController::class, 'index'])->name('orders');
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // brand > devices
    Route::get('/products/brands/{brand}', [ProductListController::class, 'brand_devices'])->name('products.brands');

    // search devices 
    Route::get('/products/search', [ProductListController::class, 'products_search'])->name('products.search');
    Route::get('/products/brands/{brand}/search', [ProductListController::class, 'products_brands_search'])->name('products.brands.search');

    // add new 
    Route::get('/products/variant/add', [ProductListController::class, 'add_variant_view'])->name('products.variant.add');
    Route::post('/products/variant/add', [ProductListController::class, 'add_variant'])->name('products.variant.add');
});
