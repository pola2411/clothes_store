<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\SettingUpdateRequest;
use App\Models\Setting;
use App\Utils\ImageUplaod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
class SettingController extends Controller
{
public function index(){
    return view('dashoard.setting.index');
}
public function update(SettingUpdateRequest $request,setting $setting){

    $setting->update($request->validated());

    if($request->has('logo')){
      $logo=  ImageUplaod::imageupload($request->logo,200,300,'logo/');
      $setting->update([
        'logo'=>$logo
    ]);
    }
    if($request->has('favicon')){
        $favicon=  ImageUplaod::imageupload($request->favicon,50,50,'logo/');
        $setting->update([
          'favicon'=>$favicon
      ]);
      }


    return redirect()->route('setting.index')->with('sussfull','sussfull update');

}
}
