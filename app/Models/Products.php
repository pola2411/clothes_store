<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=['title','description','colors','sizes','image','main_price','main_desconde','quantity','cat_id'];
 public function categories(){
    return $this->belongsTo(Categories::class,'cat_id');
 }
 public function c_s(){

   return $this->hasMany(ProdSizeColor::class,'prod_id');
 }
 public function prod_image(){
   return $this->hasMany(ProdImage::class,'prod_s_c_id');
 }
 public function order_detals(){
   return $this->hasMany(OrderDetails::class,"prod_s_c_id");
}
}
