<?php

namespace App\Http\Controllers;

use App\Http\DAO\Produccion;



class ProduccionController extends Controller
{



    public function totalProcesosActuales(){
       $produccion=new Produccion();
//        return 0
        return response()->json($produccion->TotalProcesosActuales());
    }
}
