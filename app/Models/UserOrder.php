<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $table="user_order";
    protected $fillable=['user_id','address','phone','total','status','payment_method','payment_status','payment_id','email','name','city','postal_code','country','state','shipping'];

    public function OrderDetails(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

}
