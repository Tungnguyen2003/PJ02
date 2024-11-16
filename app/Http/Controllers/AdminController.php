<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }

    public function login(){
        return view("admin.login");
    }

    public function check_login(){
        $email = request()->email;
        $password = request()->password;
        $login_data = [
            "email" => $email,
            "password" => $password
        ];
        $check = auth()->guard("employee")->attempt($login_data, request()->has("remember"));
        if($check){
            return redirect()->route("admin.index")->with([
                "login_status" => "Đăng nhập thành công",
                "login_alert" => "alert-success"
            ]);
        }
        else{
            return redirect()->route("admin.login")->with([
                "login_status" => "Email hoặc mật khẩu không hợp lệ",
                "login_alert" => "alert-danger"
            ]);
        }
    }
}
