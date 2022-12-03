<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdImage extends Model
{
    use HasFactory;
    protected $table="prod_image";
    protected $fillable=['prod_s_c_id','image'];
    public function prod_s_c(){
        return $this->belongsTo(ProdSizeColor::class,"prod_s_c_id");
    }
}
