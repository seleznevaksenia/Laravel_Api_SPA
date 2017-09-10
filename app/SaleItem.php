<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Sale::class);
    }
}
