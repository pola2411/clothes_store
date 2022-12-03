<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table="color";
    protected $fillable=['prod_id','color'];
    public function products(){
        return $this->belongsTo(Products::class,'prod_id');
    }
    public function prod_c_s(){
        return $this->hasMany(ProdSizeColor::class,'color_id');
    }
}
