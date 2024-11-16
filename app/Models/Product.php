<?php

namespace App\Models;

use App\Models\Scopes\FSScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
//    protected $table = "tbl_product";
    public $incrementing = false;
    protected $primaryKey = "ProductCode";

    protected static function booted(){
        static::addGlobalScope(new FSScope);
    }

    public function category(){
        return $this->hasOne(Category::class, "CategoryCode", "CategoryCode");
    }

    public function orders(){
        return $this->belongsToMany(Order::class, "order_details", "OrderNumber", "ProductCode");
    }
}
