<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Route::get('',[HomeController::class,'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/cart', [CartController::class, 'index']);
// Resigter
Route::get('resigter',[AuthController::class,'resigter']);
