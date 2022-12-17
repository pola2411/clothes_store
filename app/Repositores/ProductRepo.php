<?php

namespace App\Repositores;

use App\Models\Categories;
use App\Models\ProdImage;
use App\Models\Products;
use App\Utils\ImageUplaod;

class ProductRepo implements RepositoreyInterface
{


    public $products;
    public $categories;
    public $prodImage;
    public function __construct(Products $products,Categories $categories,ProdImage $prodImage)
    {
        $this->products = $products;
        $this->categories=$categories;
        $this->prodImage=$prodImage;
    }
    ////////////////////////////////////
    public function getmain()
    {
        $parent=$this->categories->select('*')->with('parent','child');
    }
////////////////////////////////////////
    public function baseQuery($relationes = [],$withCount=[])
    {
       $query= $this->products->select('*')->with('categories');
       foreach($withCount as $key=>$value){
        $query->withCount($value);

       }
       return $query;
    }
    ////////////////////////////////////

    public function store($params)
    {
        return $this->products->create($params);
    }
    ////////////////////////////
    public function addimage($product,$images,$udate=false){
        if($udate){
            $this->products->prod_image()->createMany($images['images']);
        }
        else{
        $product->prod_image()->createMany($images['images']);
        }
    }
    public function addsize($product,$sizes)
    {
        $product->size()->createMany($sizes['sizes']);
    }

    ///////////////////
    public function getall(){



    }

    ////////////////////////////////////

    public function getbyid($id, $chaldren = false)
    {
        $query= $this->products->where('id','=',$id);

        if($chaldren){
            $query=$query->with($chaldren)->get();

        }
        return  $query->firstOrFail();

    }

    /////////////////////////////////////

    public function update($id, $params)
    {
        $product=$this->getbyid($id);

        $up= $product->update($params);
        return $product;
    }

    /////////////////////////////////////

    public function delete($request)
    {
        return $this->products->destroy($request);
    }
    public function deleteimage($id){
        return $this->prodImage->destroy($id);
      }
}
