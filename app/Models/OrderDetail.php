<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = ["OrderNumber", "ProductCode"];

    public function order(){
        return $this->hasOne(Order::class, "OrderNumber", "OrderNumber");
    }

    public function product(){
        return $this->hasOne(Product::class, "ProductCode", "ProductCode");
    }
}
