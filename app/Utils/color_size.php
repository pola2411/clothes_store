<?php
namespace App\Utils;

use Illuminate\Support\Str;





class color_size
{
    public static function color_size($d){

        $co = 0;
        $t = null;
        for ($i = 0; $i < Str::length($d); $i++) {

            if ($d[$i] != ',') {
                $t .= $d[$i];
            } else {
            $colors[$co] = $t;
                $co = $co + 1;
                $t = null;
            }
            $colors[$co] = $t;

        }
        return   $colors;


    }

}
