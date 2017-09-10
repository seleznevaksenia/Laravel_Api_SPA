<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
