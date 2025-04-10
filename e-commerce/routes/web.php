<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home']);

Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::resource('cart', CartController::class);
