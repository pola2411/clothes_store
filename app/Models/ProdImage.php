<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdImage extends Model
{
    use HasFactory;
    protected $table="prod_image";
    protected $fillable=['prod_s_c_id','image'];
    public function product(){
        return $this->belongsTo(Products::class,"prod_s_c_id");
    }
}
