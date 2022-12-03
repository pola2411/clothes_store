<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressSite extends Model
{
   protected $table="address_site";
   protected $fillable=['setting_id','address'];
   public function setting(){
    return $this->belongsTo(Setting::class,"setting_id");
}
}
