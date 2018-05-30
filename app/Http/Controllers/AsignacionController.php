<?php

namespace App\Http\Controllers;

use App\Http\DAO\Item;
use App\Http\DAO\Producto;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    public function index()
    {
        return View("pages.dashboard.asignacion.index");
    }
    /* Funciones consumidas por AJAX via  API */
    public function listarItemProcesos($id_item)
    {
        $item = new Item();
        return $item->ListarProcesos($id_item);
    }

    public function updateItemProcesos(Request $request)
    {

        $info = (object)$request->all()['info'];
        $id_item = $request->id_item;
        $values = ' ';
        foreach ($info as $item) {
            $values .= "(" . $item['id_proceso'] . "," . $item['id_item'] . "," . $item['secuencia'] . "),";

        };
        $values = substr($values, 0, -1);
        (new Item())->ActualizarProcesos($id_item,$values);

    }

    public function listarProductoProcesos($id_producto)
    {
        $producto= new Producto();
        return $producto->listarProcesos($id_producto);
    }

    public function updateProductoProcesos(Request $request)
    {
        $info = (object)$request->all()['info'];
        $id_producto = $request->id_producto;
        $values = ' ';
        foreach ($info as $producto) {
            $values .= "(" . $producto['id_producto'] . "," . $producto['id_proceso'] . "," . $producto['secuencia'] . ",0,0),";

        };
        $values = substr($values, 0, -1);
        (new Producto())->actualizarProcesos($id_producto,$values);

    }

}
