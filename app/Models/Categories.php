<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable=['title','image','parent_id'];
    protected $table="categories";
    public function products(){
        return $this->hasMany(Products::class,'cat_id');
    }
    public function child(){
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(self::class, 'parent_id' , 'id');
    }

}
