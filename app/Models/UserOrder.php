<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $table="order_store";
    protected $fillable=['order_id','address','phone','total'];

    public function OrderDetails(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }


}
