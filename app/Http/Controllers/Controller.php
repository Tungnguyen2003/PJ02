<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $count = 0;
        $cart = session("cart");
        if(isset($cart)){
            $count = array_sum(array_column(session("cart"), "quantity"));
        }
        View::share("count", $count);
    }

    public function upload(){
        $rules = [
            "upload" => "required|mimes:jpg,jpeg,png,gif"
        ];
        $messages = [
            "upload.required" => "Bạn chưa upload hình ảnh",
            "upload.mimes" => "Định dạng file cho phép: jpg, jpeg, png, gif"
        ];
        request()->validate($rules, $messages);

        $fileNameData = explode(".", request()->file("upload")->getClientOriginalName());

        $fileName = md5(time().".".$fileNameData[0]).".".$fileNameData[1];
        request()->upload->move(public_path("uploads"), $fileName);
        return $fileName;
    }
}
