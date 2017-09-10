<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function companies(){
       return $this->hasMany(Company::class);
    }
    public function vendors(){
        return $this->hasMany(Vendor::class);
    }
    public function products(){
        return $this->hasManyThrough(Product::class, Vendor::class);
    }
    public function productsHistory(){
        return $this->hasManyThrough(ProductHistory::class, Vendor::class);
    }
}
