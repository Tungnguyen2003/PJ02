<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('',[HomeController::class,'index']);

// Resigter
Route::get('resigter',[AuthController::class,'resigter']);
