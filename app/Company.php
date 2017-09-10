<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
//    protected $fillable = ['id', 'user_id', 'name'];

    public function user(){
       return $this->belongsTo(User::class);
    }
}
