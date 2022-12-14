<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $table="user_address";
    protected $fillable=['user_id', 'address', 'city', 'state', 'country', 'post_code', 'phone', 'email'];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }
}
