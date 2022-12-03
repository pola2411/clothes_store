<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table="order_details";
    protected $fillable=['order_id','prod_s_c_id','price','number'];
    public function userorder(){
        return $this->belongsTo(UserOrder::class,'order_id');
    }
    public function prod_s_c(){
        return $this->belongsTo(ProdSizeColor::class,"prod_s_c_id");
    }
}
