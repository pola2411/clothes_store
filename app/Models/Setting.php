<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table="setting";
    protected $fillable=[ 'id','title', 'description', 'logo', 'favicon', 'email', 'face', 'insta', 'twitter', 'whats'];
    public function phone_site(){
        return $this->hasMany(PhoneSite::class,'setting_id');
    }
    public function address_site(){
        return $this->hasMany(AddressSite::class,'setting_id');
    }
}
