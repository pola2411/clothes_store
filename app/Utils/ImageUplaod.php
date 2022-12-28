<?php

namespace App\Utils;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ImageUplaod{

public static function imageupload($request,$height=null,$width=null,$path=null){

    $imagename=Str::uuid(). time().'.'.$request->extension();
    [$widthdef,$heightdef]=getimagesize($request);
        $height=$height ?? $heightdef;
        $width=$width ?? $widthdef;

    $image=Image::make($request->path());
    $image->fit( $width,$height , function ($constraint) {
        $constraint->upsize();
    })->stream();
    Storage::disk('images')->put($path.$imagename,$image);
    return  $path.$imagename;



}



}
