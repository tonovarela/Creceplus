<?php
namespace App\Http\DAO;

use DB;

class Categoria
{
    public function Listar(){
        return DB::select("select * from Categorias");
    }

}
