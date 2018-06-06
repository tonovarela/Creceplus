<?php

namespace App\Http\Controllers;

use App\Http\DAO\Estacion;
use App\Http\Requests\MaquinaRequest;
use Illuminate\Http\Request;
use Redirect;

class EstacionController extends Controller
{

    public function index()
    {
        $maquina = new Estacion();
        return View("pages.dashboard.catalogos.estaciones.index", ["modelo" => $maquina->Listar()]);
    }

    public function edit(Request $request)
    {
        $maquina = new Estacion();
        $data = $maquina->buscar($request->id);
        if (!$data) {
            return "No se encuentra esta maquina";
        }
        return View("pages.dashboard.catalogos.estaciones.edit", ["modelo" => $data[0]]);
    }

    public function update(MaquinaRequest $request)
    {
        $maquina = new Estacion();
        $dto = new \stdClass();
        $dto->id_estacion = $request->id_estacion;
        $dto->nombre = $request->nombre;
        $dto->activo = $request->activo == 'on' ? '1' : '0';
        $maquina->actualizar($dto);
        return Redirect::to('dashboard/catalogos/estaciones');
    }


    public function create()
    {
        return View('pages.dashboard.catalogos.estaciones.create');
    }

    public function store(Request $request)
    {
        $estacion = new Estacion();
        $dto = new \stdClass();
        $dto->nombre = $request->nombre;
        $dto->activo = $request->activo == 'on' ? '1' : '0';
        $estacion->guardar($dto);
        return Redirect::to('dashboard/catalogos/estaciones');
    }


    //API
    public function listarPorProceso($id_proceso)
    {
        $estacion= new Estacion();
        return $estacion->listarPorProceso($id_proceso);

    }

}
