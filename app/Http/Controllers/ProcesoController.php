<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProcesoRequest;
use App\Http\DAO\Proceso;

use Validator;
use Redirect;

class ProcesoController extends Controller
{
    public function index()
    {
        $proceso=new Proceso();
        $data=$proceso->Listar();
        return View('pages.dashboard.procesos.index', ["modelo"=>$data]);
    }

//    public function create()
//    {
//        return View('pages.dashboard.procesos.create');
//    }
//    public function store(ProcesoRequest $request)
//    {
//        $proceso= new Proceso();
//        $proceso->Agregar($request->descripcion);
//        return Redirect::to("dashboard/procesos");
//    }
}
