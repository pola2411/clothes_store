<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdSizeColor extends Model
{
    use HasFactory;
    protected $table="prod_size_color";
    protected $fillable=['color_id','size_id','is_stock','price','desconde','status'];

    public function color(){
return $this->belongsTo(Color::class,'color_id');

    }
    public function size(){
        return $this->belongsTo(Size::class,'size_id');

            }

    public function image(){
        return $this->hasMany(ProdImage::class,"prod_s_c_id");
    }

    public function orderdetails(){
        return $this->hasMany(OrderDetails::class,'prod_s_c_id');
    }
}
