<?php

namespace App\Models;

use App\Models\Scopes\FSScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = "OrderNumber";

    protected static function booted(){
        static::addGlobalScope(new FSScope);
    }

    public function products(){
        return $this->belongsToMany(Product::class, "order_details", "ProductCode", "OrderNumber");
    }

    public function customer(){
        return $this->hasOne(Customer::class, "CustomerCode", "CustomerCode");
    }
}
