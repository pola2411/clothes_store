<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table="size";
    protected $fillable=['prod_id','size'];
    public function products(){
        return $this->belongsTo(Products::class,'prod_id');
    }
 
}

