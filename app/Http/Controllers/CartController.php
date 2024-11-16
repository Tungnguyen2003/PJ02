<?php

namespace App\Http\Controllers;

use App\Mail\OrderMailable;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\Console\Style\success;
use DB;


class CartController extends Controller
{
    public function index(){
        return view("cart.index");
    }

    public function add(){
        $cart = session("cart");
        $product_code = request()->code;
        $product_data = Product::find($product_code)->toArray();

        if(isset($cart[$product_code])){
            $cart[$product_code]["quantity"] += 1;
        }
        else{
            $product_data["quantity"] = 1;
            $cart[$product_code] = $product_data;
        }

        session(["cart" => $cart]);

        return redirect()->route("cart.index");
    }

    public function delete(){
        $product_code = request()->code;
        $cart = session("cart");
        unset($cart[$product_code]);
        session(["cart" => $cart]);
        return redirect()->route("cart.index");
    }

    public function delete_all(){
        session("cart")->flush();
        return redirect()->route("cart.index");
    }

    public function update(){
        $cart = session("cart");
        $data = request()->data;
        foreach ($data as $key => $value){
            $cart[$key]["quantity"] = $value;
        }
        session(["cart" => $cart]);
    }

    public function checkout(){
        if(!auth()->guard("customer")->check()){
            return redirect()->route("customer.login");
        }
        else{
            $order = session("cart");
            $shipping_method = !isset(request()->shipping) ? 0 : request()->shipping;
            $shipping_fee = $shipping_method == 0 ? 50000 : 30000;
            $payment_method = !isset(request()->payment) ? 0 : request()->payment;
            $customer = auth()->guard("customer")->user();
            $token = csrf_token();

            $count = DB::table("orders")->count();
            $order_number = "FSO".sprintf("%05d", $count+1); // FSO00001
//            $order_created = date("Y-m-d H:i:s");
            $customer_code = $customer->CustomerCode;
            $employee_code = "FSE00001";
            $total = 0;
            foreach (session("cart") as $product){
                $total += $product["Price"]*$product["quantity"];
            }
            $total += $shipping_fee;

//            DB::table("orders")->insert([
//                "OrderNumber" => $order_number,
////                "OrderCreated" => $order_created,
//                "CustomerCode" => $customer_code,
//                "EmployeeCode" => $employee_code,
//                "Total" => $total,
//                "Token" => $token
//            ]);
//
//            foreach (session("cart") as $product){
//                DB::table("order_details")->insert([
//                    "OrderNumber" => $order_number,
//                    "ProductCode" => $product["ProductCode"],
//                    "Quantity" => $product["quantity"],
//                    "OriginalPrice" => $product["Price"],
//                    "SalePrice" => $product["Price"],
//                ]);
//            }

//            Mail::to(auth()->guard("customer")->user()->email)->send(new OrderMailable($order, $shipping_method, $payment_method, $customer, $token));

            session()->forget("cart");
            return redirect()->route("home.index");
        }
    }

    public function verify_order(){
        // lay ma token tu duong dan verify-order
        $token = request()->token;
        // update trang thai don hang
        // Status = 1: Đã xác nhận
    }
}
