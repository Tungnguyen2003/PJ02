<?php

namespace App\Models;

use App\Models\Scopes\FSScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected static function booted(){
        static::addGlobalScope(new FSScope);
    }
}
