<?php

namespace App\Services;

use App\Repositores\ProductRepo;
use App\Utils\ImageUplaod;
use DataTables;

class ProductServices
{


  public $productRepo;
  public function __construct(ProductRepo $productRepo)
  {

    $this->productRepo = $productRepo;
  }

  ////////////////////////////////////


  ////////////////////////////////////////
  public function baseQuery($relationes = [])
  {
  }
  ////////////////////////////////////

  public function store($params)
  {
    if (isset($params['image'])) {

      $params['image'] = ImageUplaod::imageupload($params['image']);
    }


    if(isset($params['colors'])){
     $params['colors']=implode(',',$params['colors']);
    }
    if(isset($params['sizes'])){
      $params['sizes']=implode(',',$params['sizes']);
    }
    $product=$this->productRepo->store($params);
    if(isset($params['images'])){

      $params['images']=array_map(function($image) use ($product){


        $imagename=  ImageUplaod::imageupload($image);
        $images['image']=$imagename;

        $images['prod_s_c_id']=$product->id;
        return $images;


      },$params['images']);


      return $this->productRepo->addimage($product,['images'=>$params['images']]);


    }


    return $product;




  }

  ////////////////////////////////////

  public function getbyid($id, $chaldren = false)
  {
    return $this->productRepo->getbyid($id,$chaldren);
  }

  /////////////////////////////////////

  public function update($id, $params)
  {
    if(isset($params['image'])){
      $params['image']=ImageUplaod::imageupload($params['image'],null,null,null);
    }



    if(isset($params['colors'])){
     $params['colors']=implode(',',$params['colors']);
    }
    if(isset($params['sizes'])){
      $params['sizes']=implode(',',$params['sizes']);
    }
    $product= $this->productRepo->update($id, $params);
     if(isset($params['images'])){

      $params['images']=array_map(function($image) use ($product){


        $imagename=  ImageUplaod::imageupload($image);
        $images['image']=$imagename;

        $images['prod_s_c_id']=$product->id;
        return $images;


      },$params['images']);



      return $this->productRepo->addimage($product,['images'=>$params['images']]);


    }
  return $product ;




  }
  /////////////////////////////
  public function datatable()
  {
    $query = $this->productRepo->baseQuery(['categories'],[]);

    return DataTables::of($query)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        return $btn = '
          <a href="' . route('product.edit', $row->id) . '"  class="btn btn-info btn-sm">
          <i class="bx bx-edit-alt"></i></a>



          <button type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodal" data-original-title="test" >
          <i class="bx bxs-message-x"></i>
          </button> ';
      })

      ->addColumn('categories', function ($row) {

        return $row->categories->title;
      })

      ->rawColumns(['categories', 'action'])
      ->make(true);
  }

  /////////////////////////////////////

  public function delete($request)
  {
    return $this->productRepo->delete($request);
  }
  public function deleteimage($id){
    return $this->productRepo->deleteimage($id);
  }
}
