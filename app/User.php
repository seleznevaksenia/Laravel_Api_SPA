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
    public function sales(){
        return $this->hasManyThrough(Sale::class, Company::class);
    }
    public function orders(){
        return $this->hasManyThrough(Order::class, Company::class);
    }
    public function payments(){
        return $this->hasManyThrough(Payment::class, Company::class);
    }
    public function withdraws(){
        return $this->hasManyThrough(Withdraw::class, Company::class);
    }
    public static function calculate(){
        $sales = auth()->user()->sales;
        $withdraws = auth()->user()->withdraws;
        $payments = auth()->user()->payments;
        $companies = auth()->user()->companies->pluck('name', 'id');
        $debts = round(($sales->sum('price') - $payments->sum('value')),2);
        $profit = round((($withdraws->sum('value') - $sales->sum('cost'))*0.765),2);
        $bank_value = round(($payments->sum('value') - $withdraws->sum('value')),2);
        $companies->profit = $profit;
        $companies->debts = $debts;
        $companies->in_bank = $bank_value;
        return $companies;
    }
}
