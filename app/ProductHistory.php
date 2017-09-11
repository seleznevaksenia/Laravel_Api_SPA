<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    protected $guarded = [];

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    public static function getProductsHistory(){
        return auth()->user()->productsHistory;
    }
}
