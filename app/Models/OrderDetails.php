<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table="order_card";
    protected $fillable=['prod_id','user_id','quantity','color','size','totla'];
    public function userorder(){
        return $this->belongsTo(UserOrder::class,'order_id');
    }
    public function peoduct(){
        return $this->belongsTo(Products::class,"prod_id");
    }
    public function usres(){
        return $this->belongsTo(User::class,'user_id');
    }
}
