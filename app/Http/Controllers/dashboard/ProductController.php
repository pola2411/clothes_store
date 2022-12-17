<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\product\ProductDeleteImagesRequest;
use App\Http\Requests\dashboard\product\ProductDeleteRequest;
use App\Http\Requests\dashboard\product\ProductStoreRequest;
use App\Http\Requests\dashboard\product\ProductUpdateRequest;
use App\Http\Requests\dashboard\product\StoreRequest;
use App\Services\CategoryServices;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productServices;
    public $categoryServices;
    public function __construct(ProductServices $ProductServices,CategoryServices $categoryServices)
    {
        $this->productServices=$ProductServices;
        $this->categoryServices=$categoryServices;

    }

    public function index()
    {

        return view('dashoard.products.index');
    }

    public function getall(){

        return $this->productServices->datatable();


    }


    public function create()
    {
        $categores=$this->categoryServices->getall();

        return view('dashoard.products.create',compact('categores'));
    }


    public function store(ProductStoreRequest $request)
    {


        $store=$this->productServices->store($request->validated());

        return redirect()->route('product.create');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $query=$this->productServices->getbyid($id,'prod_image');

        $categores=$this->categoryServices->getall();

       return view('dashoard.products.update',compact('query','categores'));
    }


    public function update(ProductUpdateRequest $request, $id)
    {

        $update=$this->productServices->update($id,$request->validated());

        return redirect()->route('product.edit',$id);

    }

    public function destroy($id)
    {
        //
    }
    public function delete(ProductDeleteRequest $request){
      $q= $this->productServices->delete($request->id);

      return redirect()->route('product.index');
    }
    public function deleteimage($id){
    $d=$this->productServices->deleteimage($id);
    return redirect()->route('product.index');

    }
}
