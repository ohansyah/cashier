<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Product;
use App\Livewire\Category;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/product', Product::class)->name('product.index');
    Route::get('/category', Category::class)->name('category.index');
});
