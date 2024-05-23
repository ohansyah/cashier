<?php

use App\Http\Controllers\CategoryController;
use App\Livewire\Category;
use App\Livewire\Forms\CategoryForm;
use App\Livewire\Product;
use Illuminate\Support\Facades\Route;

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
    Route::get('/category/create', CategoryForm::class)->name('category.create');
    Route::get('/category/edit/{categoryId}', CategoryForm::class)->name('category.edit');
    Route::delete('/category/delete/{categoryId}', [CategoryController::class, 'delete'])->name('category.delete');
});
