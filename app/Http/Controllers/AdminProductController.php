<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class AdminProductController extends Controller
{
    public function index(){
        $product_data = Product::all();
        return view("admin.product.index", compact(["product_data"]));
    }

    public function create(){
        $category_data = Category::all();
        return view("admin.product.create", compact(["category_data"]));
    }

    public function save(Request $request){
        $productCode = request()->productCode;
        $oldProductName = request()->oldProductName;
        $oldProductImage = request()->oldProductImage;
        $productName = request()->productName;
        $productUnit = request()->productUnit;
        $manufNation = request()->manufNation;
        $productPrice = request()->productPrice;
        $productDes = request()->productDes;
        $categoryCode = request()->categoryCode;

        $rules = [
            "productName" => "required|unique:products",
        ];
        $messages = [
            "productName.required" => "Bạn chưa nhập tên sản phẩm",
            "productName.unique" => "Tên sản phẩm đã tồn tại"
        ];

        if(isset($productCode)){ // edit
            if($oldProductName != $productName){
                request()->validate($rules, $messages);
            }

            if(request()->hasFile("upload")) $productImage = $this->upload();
            else $productImage = $oldProductImage;

            DB::table("products")->where("ProductCode", "=", $productCode)
                ->update([
                    "ProductName" => $productName,
                    "Unit" => $productUnit,
                    "ManufNation" => $manufNation,
                    "Price" => $productPrice,
                    "Description" => $productDes,
                    "CategoryCode" => $categoryCode,
                    "Image" => $productImage
                ]);
        }
        else{ // create
            request()->validate($rules, $messages);
            $productImage = $this->upload();

            $count = DB::table("products")->count();
            $productCode = "FSP".sprintf("%05d", $count+1); // FSP00001
            DB::table("products")->insert([
                "ProductCode" => $productCode,
                "ProductName" => $productName,
                "Unit" => $productUnit,
                "ManufNation" => $manufNation,
                "Price" => $productPrice,
                "Description" => $productDes,
                "CategoryCode" => $categoryCode,
                "Image" => $productImage
            ]);
        }

        return redirect()->route("admin.product.index");
    }

    public function edit(){
        $product_code = request("code");
        $product_data = Product::find($product_code); // findFirst
        $category_data = Category::all();
        return view("admin.product.edit", compact(["category_data", "product_data"]));
    }

    public function delete(){
        $product_code = request()->code;
        DB::table("products")->where("ProductCode", "=", $product_code)
            ->update([
                "deleted" => 1
            ]);
        return redirect()->route("admin.product.index");
    }
}
