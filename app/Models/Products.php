<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=['title','description','image','main_price','main_desconde','cat_id'];
 public function categories(){
    return $this->belongsTo(Categories::class,'cat_id');
 }
 public function color(){
    return $this->hasMany(Color::class,"prod_id");
 }
 public function size(){
    return $this->hasMany(Size::class,"prod_id");
 }
}
