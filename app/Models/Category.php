<?php

namespace App\Models;

use App\Models\Scopes\FSScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = "CategoryCode";

    protected static function booted()
    {
        static::addGlobalScope(new FSScope);
    }

    public function products(){
        return $this->hasMany(Product::class, "CategoryCode", "CategoryCode");
    }
}
