<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Warehouse;
use App\Models\WarehouseDetail;
use Illuminate\Http\Request;
use DB;
use function Termwind\ValueObjects\pr;

class AdminOrderController extends Controller
{
    public function index(){
        $data = Order::all();
        return view("admin.order.index", compact(["data"]));
    }

    public function cancel(){
        $order_number = request()->code;
        DB::table("orders")->where("OrderNumber", "=", $order_number)->update(["Status" => 2]);
        return redirect()->route("admin.order.index");
    }

    public function view(){
        $order_number = request()->code;
        $data = OrderDetail::all()->where("OrderNumber", "=", $order_number);
        return view("admin.order.view", compact(["data"]));
    }

    public function edit(){
        if(request()->method() == "POST"){
            $order_number = request()->hidOrderNumber;
            $product_code = request()->hidProductCode;
            $quantity = request()->hidQuantity;
            $product_status = request()->slProductStatus;
            $warehouse = request()->slWarehouse;

            $flag = 0;
            $warehouse_details = WarehouseDetail::all()->where("WarehouseCode", "", $warehouse)
                ->where("ProductCode", "=", $product_code);
            if(!empty($warehouse_details->toArray())){
                $warehouse_details = $warehouse_details->toArray()[0];
                if($warehouse_details["Quantity"] >= $quantity) $flag = 1;
            }

            if($flag == 0 && $product_status == 3){
                session()->flash($product_code, "Không đủ tồn kho");
            }
            else{
                // giam ton kho san pham
                if($product_status == 3) {
                    DB::table("warehouse_details")
                        ->where("WarehouseCode", "=", $warehouse)
                        ->where("ProductCode", "=", $product_code)
                        ->update(["Quantity" => $warehouse_details["Quantity"] - $quantity]);
                }
                // cap nhat trang thai san pham
                DB::table("order_details")
                    ->where("OrderNumber", "=", $order_number)
                    ->where("ProductCode", "=", $product_code)
                    ->update(["Status" => $product_status]);
            }
        }
        $order_number = request()->code;
        $data = OrderDetail::all()->where("OrderNumber", "=", $order_number);
        $warehouses = Warehouse::all();
        return view("admin.order.edit", compact(["data", "warehouses"]));
    }
}
