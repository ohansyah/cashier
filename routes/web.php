<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Livewire\Cashier;
use App\Livewire\Category;
use App\Livewire\Forms\CategoryForm;
use App\Livewire\Forms\ProductForm;
use App\Livewire\Order;
use App\Livewire\OrderDetail;
use App\Livewire\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('cashier.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/product', Product::class)->name('product.index');
    Route::get('/product/create', ProductForm::class)->name('product.create');
    Route::get('/product/edit/{productId}', ProductForm::class)->name('product.edit');
    Route::delete('/product/delete/{productId}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/category', Category::class)->name('category.index');
    Route::get('/category/create', CategoryForm::class)->name('category.create');
    Route::get('/category/edit/{categoryId}', CategoryForm::class)->name('category.edit');
    Route::delete('/category/delete/{categoryId}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/cashier', Cashier::class)->name('cashier.index');

    Route::get('/order', Order::class)->name('order.index');
    Route::get('/order/{id}', OrderDetail::class)->name('order.show');
});
