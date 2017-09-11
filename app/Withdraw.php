<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public static function getWithdraws(){
        return auth()->user()->withdraws;
    }
}
