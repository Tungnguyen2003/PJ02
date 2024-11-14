<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function show($id)
    // {
    //     // Tải sản phẩm từ cơ sở dữ liệu với ID (giả định đã có model Product)
    //     $product = Product::find($id);
    //     return view('product.index', compact('product'));
    // }
    public function index(){
        return view('product.index');
    }
}
?>
