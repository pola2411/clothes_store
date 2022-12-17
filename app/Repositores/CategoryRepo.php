<?php

namespace App\Repositores;
use App\Models\Categories;

class CategoryRepo implements RepositoreyInterface{

   public $categories;
   ////////////////////
  public function __construct(Categories $categories)
  {
    $this->categories=$categories;

  }


  ///////////////////////////////////////////////////
  public function getmain(){

    return $this->categories->where('parent_id', 0)->get();


  }
  ///////////////////////////////////////////////////

  public function baseQuery($relationes=[]){

    $query=$this->categories->select('*')->with($relationes);
    return $query;




  }



  ////////////////////////////////////////////////////

  public function store($params){
    return $this->categories->create($params);
  }
/////////////////////////////////////////////////////

public function getbyid($id,$chaldren=false){

    $query= $this->categories->where('id','=',$id);
    if($chaldren=true){
     $query->withcount('child');
    }

    return  $query->firstOrFail();
}


/////////////////////////////////////////////////////

public function update($id,$params){
    $category=$this->getbyid($id);

    if($params['image']){
        unlink(public_path($category->image));

    }

    return  $category->update($params);



}
///////////////////////////////////////////////////////
public function delete($request){

    $categore=$this->getbyid($request);
    unlink(public_path($categore->image));

    return $categore->delete();

}
//////////////////////////////////////////////////////


}
