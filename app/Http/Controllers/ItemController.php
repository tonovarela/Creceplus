<?php

namespace App\Http\Controllers;

use App\Http\DAO\Item;
use App\Http\DAO\Medida;
use App\Http\DAO\Papel;
use App\Http\DAO\Proceso;
use App\Http\DAO\Categoria;
use App\Http\DAO\Tipo;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return View("pages.dashboard.catalogos.items.index");
    }
    public function add()
    {
        return View("pages.dashboard.catalogos.items.add");
    }
    public function show($id)
    {
        $item = new Item();
        $data = $item->ObtenerporID($id);
        if (!$data) {
            return View('errors.404');
        }
        return View("pages.dashboard.catalogos.items.edit", ["modelo" => $data[0]]);

    }
    public function store(Request $request)
    {
        $info = $request->all()['item'];
        $data = (object)$info;
        $item = new Item();
        $status = new \StdClass();
        if ($item->obtenerporSKU($data->sku)) {
            $status->error = 1;
            $status->mensaje = "No se puede guardar";

        } else {
            $status->error = 0;
            $status->mensaje = "Item Guardado";
            $item->Agregar($data);
        }

        return response()->json($status);

    }
    public function update(Request $request)
    {
        $info = $request->all()['item'];
        $item = new Item();
        $data = (object)$info;
        $status = new \StdClass();
        $status->error = 0;
        if ($item->existeSKU($data->sku, $data->id_item)) {
            $status->error = 1;
            $status->mensaje = "No puede guardar";
        } else {
            $item->Actualizar($data);
            $status->mensaje = "Item actualizado";
        }

        return response()->json($data);


    }
    public function showproceso($id)
    {
        $item = new Item();
        $data = $item->obtenerPorID($id);
        if (!$data) {
            return View('errors.404');
        }
//        return response()->json(["modelo" => $data[0]]);
        return View("pages.dashboard.catalogos.items.procesos", ["modelo" => $data[0]]);

    }


//    funciones API consumidas por AJAX
    public function ItemCatalogo()
    {
        $dto = new \Stdclass;
        $dto->Categorias = (new Categoria())->Listar();
        $dto->Tipos = (new Papel())->Listar();
        $dto->Medidas = (new Medida())->Listar();

        return response()->json($dto);
    }

    public function ItemInfo(Request $request)
    {

        $item = new Item();
        $dto = new \Stdclass;
        $dto->Categorias = (new Categoria())->Listar();
        $dto->Tipos = (new Papel())->Listar();
        $dto->Medidas = (new Medida())->Listar();
        $dto->Item = $item->ObtenerporID($request->id)[0];
        return response()->json($dto);

    }

    public function ItemList()
    {
        $item = new Item();
        return response()->json($item->Listar());
    }





}
