<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function index(){
        $search = request()->search;
        $category_code = request()->category;  // Lấy tham số category từ URL
    
        // Nếu có tìm kiếm, lọc theo tên sản phẩm
        if (isset($search)) {
            $product_data = DB::table("products")
                ->where("deleted", 0)
                ->where("ProductName", "like", '%' . $search . '%')
                ->paginate(12);  // Sử dụng paginate ở đây
        } else {
            // Nếu có category_code thì lọc theo category, nếu không thì lấy tất cả sản phẩm
            if (isset($category_code)) {
                $product_data = Product::where("CategoryCode", $category_code)
                    ->where("deleted", 0)
                    ->paginate(12);  // Sử dụng paginate ở đây
            } else {
                $product_data = Product::where("deleted", 0)
                    ->paginate(12);  // Nếu không có category, hiển thị tất cả sản phẩm
            }
        }
    
        $category_data = Category::all();  // Lấy danh sách các category
    
        return view("product.index", compact(["category_data", "product_data", "category_code"]));
    }
    
    

    public function detail(){
        $product_code = request()->code;
        $product_data = Product::find($product_code);

        $related_product_data = Product::all()->where("CategoryCode", "=", $product_data->CategoryCode);
        return view("product.detail", compact(["product_data", "related_product_data"]));
    }
}
