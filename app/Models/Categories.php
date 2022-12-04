<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=['title','image','parent_id'];
    
    public function products(){
        return $this->hasMany(Products::class,'cat_id');
    }
}
