<?php

namespace App\Http\Controllers;

use App\Http\DAO\Papel;
use App\Http\Requests\PapelRequest;
use Couchbase\PasswordAuthenticator;


class PapelController extends Controller
{
    public function index()
    {
        $papel = new Papel();
        $modelo = $papel->Listar();
        return View("pages.dashboard.catalogos.papel.index", ['modelo' => $modelo]);
    }

    public function add()
    {
        return View('pages.dashboard.catalogos.papel.add');
    }

    public function store(PapelRequest $request)
    {
        $papel = new Papel();
        $dto = new \stdClass();
        $dto->nombre = $request->nombre;
        $dto->gramaje = $request->gramaje;
        $dto->medidas = $request->medidas;
        $papel->Guardar($dto);
        return redirect('dashboard/catalogos/papel');
    }

    public function edit($id)
    {
        $papel = new Papel();
        $modelo = $papel->buscarporID($id);
        return View('pages.dashboard.catalogos.papel.edit', ["modelo" => $modelo[0]]);


    }

    public function update(PapelRequest $request)
    {


        $papel = new Papel();
        $dto = new \StdClass();
        $dto->id_tipopapel= $request->id_tipopapel;
        $dto->nombre = $request->nombre;
        $dto->gramaje = $request->gramaje;

        $papel->Actualizar($dto);
       return redirect("dashboard/catalogos/papel");


    }
}
