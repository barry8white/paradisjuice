<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/table/{tabnum}', [AddProductController::class, 'list'])->name('showproductsforClient');
Route::post('/table', [OrderController::class, 'store'])->name('orderStore');


Route::get('/admin/products', [AddProductController::class, 'products'])->name('showProductsForAdmin');

Route::get('/admin/orders', [OrderController::class, 'display'])->name('display.order');
Route::get('/Api/orders', [OrderController::class, 'result'])->name("only.result");
Route::patch('/admin/orders/{order}', [OrderController::class, 'update'])->name("update.order");

Route::get('/order/success', [OrderController::class, 'success'])->name("order.success");


Route::get('/admin/addProduct', [AddProductController::class, 'index'])->name('addProductPage.show');
Route::post('/admin/addProduct', [AddProductController::class, 'store'])->name('productStoreFunction.store');
Route::delete('/admin/deleteProd/{id}', [AddProductController::class, 'destroy'])->name('product.delete');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
