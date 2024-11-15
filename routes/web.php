<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Route::get("", [HomeController::class, "index"])->name("home.index");

// Route::get('/product/{id}', [ProductController::class, 'show'])->name("product.index");
Route::get('product', [ProductController::class, 'index'])->name("product.index");

Route::get('/cart', [CartController::class, 'index'])->name("cart.index");
// Resigter
Route::get('resigter',[AuthController::class,'resigter']);
