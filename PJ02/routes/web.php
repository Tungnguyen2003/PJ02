<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// home
Route::get('',[HomeController::class,'index']);

// Resigter
Route::get('resigter',[AuthController::class,'resigter']);
Route::post('resigter_post',[AuthController::class,'resigter_post']);

// Login
Route::get('login',[AuthController::class,'login']);
Route::post('login_post', [AuthController::class,'login_post']);

// forgot password

Route::get('forgot',[AuthController::class,'forgot']);



//
Route::group(['middleware' => 'admin'], function(){

});

Route::group(['middleware' => 'user'], function(){

});