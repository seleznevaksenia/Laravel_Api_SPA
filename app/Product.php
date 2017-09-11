<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    public function saleItem(){
        return $this->hasOne(SaleItem::class);
    }
    public function orderItem(){
        return $this->hasOne(OrderItem::class);
    }
    public static function getProducts(){
        return auth()->user()->products;
    }

}
