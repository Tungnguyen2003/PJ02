<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Termwind\ValueObjects\pr;
use DB;

class CustomerController extends Controller
{
    public function register(){
        return view("customer.register");
    }

    public function login(){
        return view("customer.login");
    }

    public function logout(){
        auth()->guard("customer")->logout();
        session()->flush();
        return redirect()->route("home.index");
    }

    public function check_login(){
        $email = request()->email;
        $password = request()->password;
        $login_data = [
            "email" => $email,
            "password" => $password
        ];
        $check = auth()->guard("customer")->attempt($login_data, request()->has("remember"));
        if($check){
            return redirect()->route("home.index")->with([
                "login_status" => "Đăng nhập thành công",
                "login_alert" => "alert-success"
            ]);
        }
        else{
            return redirect()->route("customer.login")->with([
                "login_status" => "Email hoặc mật khẩu không hợp lệ",
                "login_alert" => "alert-danger"
            ]);
        }
    }

    public function save(){
        $rules = [
            "email" => "unique:customers",
            "password_confirmation" => "same:password"
        ];
        $messages = [
            "email.unique" => "Email đã tồn tại",
            "password_confirmation.same" => "Mật khẩu xác nhận chưa khớp"
        ];
        request()->validate($rules, $messages);

        $count = DB::table("customers")->count();
        $customerCode = "FSU".sprintf("%05d", $count+1); // FSU00001
        $registered = date("Y-m-d H:i:s");
        $email = request()->email;
//        $password = Hash::make(request()->password); //
        $password = bcrypt(request()->password); // bcrypt
        $fullName = request()->name;
        $address = request()->address;
        $phone = request()->phone;
        $birthday = request()->birthday;
        DB::table("customers")->insert([
            "CustomerCode" => $customerCode,
            "Registered" => $registered,
            "email" => $email,
            "password" => $password,
            "FullName" => $fullName,
            "Address" => $address,
            "Phone" => $phone,
            "Birthday" => $birthday
        ]);
        request()->session()->flash("message", "Bạn đã đăng ký thành công");
        request()->session()->flash("alert-class", "alert-success");
        return redirect()->route("home.index");
    }

    public function order(){
        $customer_code = auth()->guard("customer")->user()->CustomerCode;
        $data = Order::all()->where("CustomerCode", "=", $customer_code);
        return view("customer.order", compact(["data"]));
    }
}
