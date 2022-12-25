<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\ProdImage;
use App\Models\Products;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DataTables;

class IndexController extends Controller
{
    public $id;
    public function index()
    {
        $parent = Categories::where('parent_id', 0)->get();
        $child = Categories::with('child')->get();

        return view('public_user.first_page.index', compact('parent', 'child'));
    }
    public function prod_page($id)
    {
        $query = Products::where('cat_id', '=', $id)->with('categories')->get();
        return view('public_user.prodact_page.prodact_page', compact('query'));
    }
    public function yajra_prod($id)
    {


        $query = Products::where('cat_id', '=', $id)->get();

        return  DataTables::of($query)
            ->addIndexColumn()


            ->make(true);
    }


    public function showprod($id)
    {
        $data = Products::where('id', $id)->with('prod_image')->firstOrFail();
        $d = $data->colors;
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





        return view('public_user.prodact_page.prod_show', compact('data','colors'));
    }
}
