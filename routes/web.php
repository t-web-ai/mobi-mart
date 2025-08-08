<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\DeviceController;
use App\Http\Controllers\admin\OrderListController;
use App\Http\Controllers\admin\ProductListController;
use App\Http\Controllers\admin\UserListController;
use App\Http\Middleware\admin\IsAdmin;
use App\Http\Middleware\admin\IsGuest;
use App\Models\Brand;
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
    Route::post('/orders', [OrderListController::class, 'index'])->name('orders');
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // brand > devices
    Route::get('/products/brands/{brand}', [ProductListController::class, 'brand_devices'])->name('products.brands');

    // search devices 
    Route::get('/products/search', [ProductListController::class, 'products_search'])->name('products.search');
    Route::get('/products/brands/{brand}/search', [ProductListController::class, 'products_brands_search'])->name('products.brands.search.id');

    // add new 
    Route::get('/products/variant/add', [ProductListController::class, 'add_variant_view'])->name('products.variant.add');
    Route::post('/products/variant/add', [ProductListController::class, 'add_variant'])->name('products.variant.add');

    // product view 
    Route::get('/products/colors', [ColorController::class, 'index'])->name('products.colors');
    Route::get('/products/color/search', [ColorController::class, 'search'])->name('products.colors.search');
    Route::get('/products/color/add', [ColorController::class, 'form'])->name('products.color.add');
    Route::post('products/color/add', [ColorController::class, 'store'])->name('products.color.add');

    Route::get('/products/brands', [BrandController::class, 'index'])->name('products.brands');
    Route::get('/products/brand/search', [BrandController::class, 'search'])->name('products.brands.search');
    Route::get('/products/brand/add', [BrandController::class, 'form'])->name('products.brand.add');
    Route::post('products/brand/add', [BrandController::class, 'store'])->name('products.brand.add');

    Route::get('/products/devices', [DeviceController::class, 'index'])->name('products.devices');
    Route::get('/products/device/search', [DeviceController::class, 'search'])->name('products.devices.search');
    Route::get('/products/device/add', [DeviceController::class, 'form'])->name('products.device.add');
    Route::post('products/device/add', [DeviceController::class, 'store'])->name('products.device.add');

    // delete brand, color, device, variant
    Route::delete('/products/brands/{brand}/delete', [BrandController::class, 'destroy'])->name('products.brands.delete');
    Route::delete('/products/colors/{color}/delete', [ColorController::class, 'destroy'])->name('products.colors.delete');
    Route::delete('/products/devices/{device}/delete', [DeviceController::class, 'destroy'])->name('products.devices.delete');
    Route::delete('/products/variants/{variant}/delete', [ProductListController::class, 'destroy'])->name('products.variants.delete');

    // update brand, color, device, variant
    Route::get('/products/brands/{brand}/update', [BrandController::class, 'update_form'])->name('products.brands.update');
    Route::put('/products/brands/{brand}/update', [BrandController::class, 'update'])->name('products.brands.update');

    Route::get('/products/colors/{color}/update', [ColorController::class, 'update_form'])->name('products.colors.update');
    Route::put('/products/colors/{color}/update', [ColorController::class, 'update'])->name('products.colors.update');

    Route::get('/products/devices/{device}/update', [DeviceController::class, 'update_form'])->name('products.devices.update');
    Route::put('/products/devices/{device}/update', [DeviceController::class, 'update'])->name('products.devices.update');

    Route::get('/products/variants/{variant}/update', [ProductListController::class, 'update_form'])->name('products.variants.update');
    Route::put('/products/variants/{variant}/update', [ProductListController::class, 'update'])->name('products.variants.update');

    // Order deleting
    Route::delete('/orders/{order}/delete', [OrderListController::class, 'destroy'])->name('orders.delete');
    Route::put('/orders/{order}/confirm', [OrderListController::class, 'confirm'])->name('orders.confirm');
});
