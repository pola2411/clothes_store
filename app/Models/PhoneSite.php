<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneSite extends Model
{
    use HasFactory;
    protected $table="phone_site";
    protected $fillable=['setting_id','phone'];
    public function setting(){
        return $this->belongsTo(Setting::class,"setting_id");
    }
}
