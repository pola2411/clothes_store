<?php

namespace App\Services;

use App\Models\Categories;
use App\Utils\ImageUplaod;
use DataTables;
use Illuminate\Database\Eloquent\Model;
use App\Repositores\CategoryRepo;

class CategoryServices
{
  public $categoryrepo;
  /////////////////////
  public function __construct(CategoryRepo $categoryrepo)
  {
    $this->categoryrepo = $categoryrepo;
  }
  //////////////////////////////////////
  public function getmain()
  {

    return $this->categoryrepo->getmain();
  }
  ///////////////////////////////////////
  public function store($params)
  {
    $params['parent_id'] = $params['parent_id'] ?? 0;
    if (isset($params['image'])) {
      $params['image'] = ImageUplaod::imageupload($params['image']);
    }
    return $this->categoryrepo->store($params);
  }
  /////////////////////////////////////////

  public function getbyid($id, $chaldren = false)
  {
    return $this->categoryrepo->getbyid($id, $chaldren);
  }
  //////////////////////////////////////////////////
  public function update($id, $params)
  {



    $params['parent_id'] = $params['parent_id'] ?? 0;
    if (isset($params['image'])) {

      $params['image'] = ImageUplaod::imageupload($params['image'], 100, 100);
    }

    return  $this->categoryrepo->update($id, $params);
  }

  ////////////////////////////////////////////////////////////

  public function datatable()
  {
    $query = $this->categoryrepo->baseQuery('parent');
    return DataTables::of($query)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        return $btn = '
            <a href="' . route('categores.edit', $row->id) . '"  class="btn btn-info btn-sm">
            <i class="bx bx-edit-alt"></i></a>



            <button type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodal" data-original-title="test" >
            <i class="bx bxs-message-x"></i>
            </button> ';
      })
      ->addColumn('image', function ($row) {
        return '<img src="' . asset($row->image) . '" width="100px" height="100px" alt="not">';
      })
      ->addColumn('parent', function ($row) {

        if ($row->parent) {
          return $row->parent->title;
        }
        return 'القسم الرئيسى';
      })

      ->rawColumns(['parent', 'action', 'image'])
      ->make(true);
  }


  ///////////////////////////////////////////
  public function delete($request)
  {

    return $this->categoryrepo->delete($request);
  }
  //////////////////////////
  public function getall(){
return $this->categoryrepo->baseQuery('child')->get();

  }
}
