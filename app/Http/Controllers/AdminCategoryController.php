<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Hamcrest\Core\DescribedAs;
use Illuminate\Http\Request;
use DB;

class AdminCategoryController extends Controller
{
    public function index(){
        $category_data = Category::all();
        return view("admin.category.index", compact(["category_data"]));
    }

    public function create(){
        return view("admin.category.create");
    }

    public function edit(){
        $category_code = request()->code;
        $category_data = DB::table("categories")->where("CategoryCode", "=", $category_code)->get()[0];
        return view("admin.category.edit", compact(["category_data"]));
    }

    public function save(){
        $categoryName = request()->categoryName;
        $categoryDes = request()->categoryDes;

        $categoryCode = request()->categoryCode;
        if(isset($categoryCode)){ // edit
            $oldCategoryName = request()->oldCategoryName;
            if($oldCategoryName != $categoryName){
                $rules = [
                    "categoryName" => "required|unique:categories",
                ];
                $messages = [
                    "categoryName.required" => "Bạn chưa nhập tên danh mục",
                    "categoryName.unique" => "Tên danh mục đã tồn tại"
                ];
                request()->validate($rules, $messages);
            }

            DB::table("categories")->where("CategoryCode", "=", $categoryCode)->update([
                "CategoryName" => $categoryName,
                "Description" => $categoryDes
            ]);
        }
        else{ // create
            $rules = [
                "categoryName" => "required|unique:categories",
            ];
            $messages = [
                "categoryName.required" => "Bạn chưa nhập tên danh mục",
                "categoryName.unique" => "Tên danh mục đã tồn tại"
            ];
            request()->validate($rules, $messages);

            $count = DB::table("categories")->count();
            $categoryCode = "FSC".sprintf("%05d", $count+1); // FSC00001
            DB::table("categories")->insert([
                "CategoryCode" => $categoryCode,
                "CategoryName" => $categoryName,
                "Description" => $categoryDes
            ]);
        }

        return redirect()->route("admin.category.index");
    }

    public function delete(){
        $category_code = request()->code;
        $query = DB::table("categories")->where("CategoryCode", "=", $category_code)
            ->update([
                "deleted" => 1
            ]);
        if($query){
            return redirect()->route("admin.category.index");
        }
        return abort("500");
    }
}
