<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Http\Requests\view\Add_prodRequest;
use App\Http\Requests\view\Delete_prodRequest;
use App\Http\Requests\view\Update_prodRequest;
use App\Models\Categories;
use App\Models\OrderDetails;
use App\Models\ProdImage;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Utils;
use Cart;
use App\Utils\color_size;
use Illuminate\Support\Str;
use DataTables;


class IndexController extends Controller
{
    public $id;
    public $items = array();
    public $totla;
    public $ar = array();
    public $i = 0;
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
        $colors = color_size::color_size($d);
        $s = $data->sizes;
        $sizes = color_size::color_size($s);

        $userID = auth()->user()->id;

        /* Cart::session($userID)->add(array(
            'id' => $data->id,
            'name' => $data->title,
            'price' => $data->main_desconde,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $data
        ));
        */


        /*        $items = Cart::getContent();
        $su= \Cart::getTotal();
        dd($items, $su);*/
        return view('public_user.prodact_page.prod_show', compact('data', 'colors', 'sizes'));
    }

    public function addtocard(Add_prodRequest $request)
    {
        $data = Products::where('id', $request->prod_id)->with('prod_image')->firstOrFail();
        $d = $data->colors;
        $colors = color_size::color_size($d);
        $s = $data->sizes;
        $sizes = color_size::color_size($s);

        $rowId = $data->id;
        $userID = auth()->user()->id;
        $totla_one = $data->main_desconde * $request->quantity;
        Cart::session($userID)->add(array(
            'id' => $data->id,
            'name' => $data->title,
            'price' => $data->main_desconde,
            'quantity' => $request->quantity,
            'attributes' => array('color' => $request->color, 'size' => $request->size),
            'associatedModel' => $data
        ));

        $this->items = Cart::getContent();
        $this->totla = \Cart::getTotal();
        $items = $this->items;
        $totla = $this->totla;






        return redirect()->route('index_card');
    }


    public function order_create()
    {


        $userId = auth()->user()->id;
        $du = Cart::session($userId)->getContent();




        $cartTotalQuantity = Cart::session($userId)->getTotalQuantity();
        $subTotal = Cart::session($userId)->getSubTotal();

        $totla = \Cart::getTotal();

        foreach ($du as $data) {
            $create = OrderDetails::create([
                'prod_id' => $data->id,
                'user_id' => $userId,
                'quantity' => $data->quantity,
                'color' => $data->attributes->color,
                'size' => $data->attributes->size,
                'totla' =>  $data->quantity*$data->associatedModel->main_desconde
            ]);
            Cart::session($userId)->remove($data->id);
        }

        return redirect()->route('index_first');
    }

    //////////////////////////////////////
    public function index_card()
    {
        $userId = auth()->user()->id;
        $items = Cart::session($userId)->getContent();
        $totla = \Cart::getTotal();
        return view('public_user.prodact_page.card_show', compact('items', 'totla'));
    }

    public function update_card(Update_prodRequest $request)
    {


        $userId = auth()->user()->id;
        $items = Cart::session($userId)->getContent();



        Cart::update($request->prod_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
        ));

        /*     \Cart::session($userId)->update($request->prod_id,[
            'quantity' => -$request->quantity,


        ]);
        */
        return redirect()->route('index_card');
    }

    /////////////////////////////////////////////
    public function delete_from_card(Delete_prodRequest $request){
        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($request->prod_id);
        return redirect()->route('index_card');


    }
}
