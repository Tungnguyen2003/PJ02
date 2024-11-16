<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AdminWarehouseController extends Controller
{
    public function index(){
        return view("admin.warehouse.index");
    }

    public function transfer(){
        $warehouses = Warehouse::all();
        $products = Product::all();
        return view("admin.warehouse.transfer", compact(["warehouses", "products"]));
    }

    public function post_transfer(){
        // giam ton kho cua san pham tai Nguon chuyen hang

        // tang ton kho cua san pham tai Diem chuyen hang

        // luu giao dich vao bang warehouse_to_warehouse
    }
}
