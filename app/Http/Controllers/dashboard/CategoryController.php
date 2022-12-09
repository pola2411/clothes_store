<?php

namespace App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\category\CategoryStoreRequest;
use App\Http\Requests\dashboard\category\CategoryUpdateRequest;
use App\Http\Requests\dashboard\category\DeleteRequest;
use App\Models\Categories;
use App\Models\Setting;
use App\Services\CategoryServices;
use Illuminate\Http\Request;
use DataTables;


class CategoryController extends Controller
{

    public $categoryServices;
    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }
    public function index()
    {
        $main =$this->categoryServices->getmain();


        return view('dashoard.categoryes.index', compact('main'));
    }



    public function getall()
    {

        return $this->categoryServices->datatable();
    }

 
    public function store(CategoryStoreRequest $request)
    {
        $this->categoryServices->store($request->validated());
        return redirect()->route('categores.index');
    }


    public function edit($id)
    {
        $maincategory = $this->categoryServices->getmain();
        $data = $this->categoryServices->getbyid($id, $chaldren = true);
        return view('dashoard.categoryes.edit', compact('data', 'maincategory'));
    }


    public function update(CategoryUpdateRequest $request, $id)
    {

        $update=$this->categoryServices->update($id,$request->validated());
        return redirect()->route('categores.edit',$id);
    }


    public function delete(DeleteRequest $request)
    {
       $this->categoryServices->delete($request->id);
        return redirect()->route('categores.index');
    }
}
