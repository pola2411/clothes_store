<?php
namespace App\Repositores;

interface RepositoreyInterface{

    public function getmain();
    public function baseQuery($relationes = []);
    public function store($params);
    public function getbyid($id, $chaldren = false);
    public function update($id, $params);
    public function delete($request);

}
