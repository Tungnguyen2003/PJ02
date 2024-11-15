<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm trong giỏ hàng từ session hoặc cơ sở dữ liệu
        $cartItems = session()->get('cart', []);
        return view('cart.index', compact('cartItems'));
    }
}
?>

