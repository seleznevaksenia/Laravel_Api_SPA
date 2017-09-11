<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function user(){
       return $this->belongsTo(User::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function orderItems(){
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function withdraws(){
        return $this->hasMany(Withdraw::class);
    }
    public function sales(){
        return $this->hasMany(Sale::class);
    }
    public function saleItems(){
        return $this->hasManyThrough(SaleItem::class, Sale::class);
    }
}
