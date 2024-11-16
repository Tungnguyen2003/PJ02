<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminWarehouseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("", [HomeController::class, "index"])->name("home.index");
Route::get("product", [ProductController::class, "index"])->name("product.index");
Route::get("product/detail/{code}", [ProductController::class, "detail"])->name("product.detail");
Route::group(["prefix" => "admin", "middleware" => "employee"], function (){
    Route::get("", [AdminController::class, "index"])->name("admin.index");
    Route::get("category", [AdminCategoryController::class, "index"])->name("admin.category.index");
    Route::get("category/create", [AdminCategoryController::class, "create"])->name("admin.category.create");
    Route::get("category/edit/{code}", [AdminCategoryController::class, "edit"])->name("admin.category.edit");
    Route::get("category/delete/{code}", [AdminCategoryController::class, "delete"])->name("admin.category.delete");
    Route::post("category/save", [AdminCategoryController::class, "save"])->name("admin.category.save");

    Route::get("product", [AdminProductController::class, "index"])->name("admin.product.index");
    Route::get("product/create", [AdminProductController::class, "create"])->name("admin.product.create");
    Route::get("product/edit/{code}", [AdminProductController::class, "edit"])->name("admin.product.edit");
    Route::get("product/delete/{code}", [AdminProductController::class, "delete"])->name("admin.product.delete");
    Route::post("product/save", [AdminProductController::class, "save"])->name("admin.product.save");
    Route::get("order", [AdminOrderController::class, "index"])->name("admin.order.index");
    Route::get("order/cancel/{code}", [AdminOrderController::class, "cancel"])->name("admin.order.cancel");
    Route::get("order/view/{code}", [AdminOrderController::class, "view"])->name("admin.order.view");
    Route::get("order/edit/{code}", [AdminOrderController::class, "edit"])->name("admin.order.edit");
    Route::post("order/edit/{code}", [AdminOrderController::class, "edit"])->name("admin.order.edit");
    Route::get("warehouse", [AdminWarehouseController::class, "index"])->name("admin.warehouse.index");
    Route::get("warehouse/transfer", [AdminWarehouseController::class, "transfer"])->name("admin.warehouse.transfer");

});
Route::get("admin/login", [AdminController::class, "login"])->name("admin.login");
Route::post("admin/check_login", [AdminController::class, "check_login"])->name("admin.check_login");

Route::group(["prefix" => "customer"], function (){
    Route::get("register", [CustomerController::class, "register"])->name("customer.register");
    Route::get("login", [CustomerController::class, "login"])->name("customer.login");
    Route::get("logout", [CustomerController::class, "logout"])->name("customer.logout");
    Route::post("check_login", [CustomerController::class, "check_login"])->name("customer.check_login");
    Route::post("save", [CustomerController::class, "save"])->name("customer.save");
    Route::get("order", [CustomerController::class, "order"])->name("customer.order");
});
Route::group(["prefix" => "cart"], function (){
   Route::get("/", [CartController::class, "index"])->name("cart.index");
   Route::get("add/{code}", [CartController::class, "add"])->name("cart.add");
   Route::get("delete/{code}", [CartController::class, "delete"])->name("cart.delete");
   Route::get("delete_all", [CartController::class, "delete_all"])->name("cart.delete_all");
   Route::post("update", [CartController::class, "update"])->name("cart.update");
   Route::post("checkout", [CartController::class, "checkout"])->name("cart.checkout");
});
Route::group(["prefix" => "order"], function (){
    Route::get('verify-order/{token}', [OrderController::class, 'verify_order'])->name('order.verify_order');
});
