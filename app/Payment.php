<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public static function getPayments(){
        return auth()->user()->payments;
    }
}
