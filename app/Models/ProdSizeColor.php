<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdSizeColor extends Model
{
    use HasFactory;
    protected $table="prod_size_color";
    protected $fillable=['color_id','prod_id','size_id','is_stock','price','desconde','status'];



    public function image(){
        return $this->hasMany(ProdImage::class,"prod_s_c_id");
    }

    public function product()
    {
     return $this->belongsTo(Products::class,'prod_id');
    }


    public function orderdetails(){
        return $this->hasMany(OrderDetails::class,'prod_s_c_id');
    }
}
