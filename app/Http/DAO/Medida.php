<?php
namespace App\Http\DAO;

use DB;

class Medida
{

    public function Listar()
    {
        return DB::select("select *  from  Medidas");
    }


}
