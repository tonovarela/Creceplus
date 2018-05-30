<?php

namespace App\Http\Controllers;

use App\Http\DAO\Producto;

use App\Http\DAO\Orden;
use App\Http\DAO\Item;
use PDF;


class OrdenController extends Controller
{



    public function index()
    {
        return View("pages.dashboard.ordenes.index");

    }

    public function detalle($ordenNumero)
    {
        $producto = new Producto();
        $values = $producto->porNumeroOrdenSecuencia($ordenNumero);
        $dto = array();
        foreach ($values as $obj) {
            $objeto = new \stdClass();
            $objeto->id_producto = $obj->id_producto;
            $objeto->nombre = $obj->nombre;
            $objeto->cantidadordenada = $obj->cantidadordenada;
            $objeto->sku = $obj->sku;
            $objeto->especificacion = $obj->especificacion;
            $objeto->Procesos = [];
            $dto[$objeto->id_producto] = $objeto;
        }
        //Se quitan los valores duplicados
        $keys = array_keys($dto);
        //Se llenan la lista de procesos por id_producto
        foreach ($values as $value) {
            if (current($keys) != $value->id_producto)
                next($keys);
            $proceso = new \StdClass();
            $proceso->id_proceso = $value->id_proceso;
            $proceso->nombreProceso = $value->nombreProceso;
            $proceso->secuencia = $value->secuencia;
            $proceso->actual = $value->actual;
            $proceso->procesado = $value->procesado;
            $proceso->nombre = $value->nombre;
            array_push($dto[current($keys)]->Procesos, $proceso);
        }


        return View("pages.dashboard.ordenes.detalle", ["data" => $dto,"orden_numero"=>$ordenNumero]);
    }
    //Representacion Impresa
    public function detalleImpreso($numero_orden)
    {
        $orden = new Orden();
        $item = new Item();
        $dto = new \StdClass();
        $data=$orden->obtenerPorNumero($numero_orden);
        if ($data==null){
            return View('errors.404');
        }
        $dto->orden =$data[0];
        $dto->items = $item->obtenerPorNumeroOrden($numero_orden);


        $pdf = PDF::loadView('ordenimpresion', ['data' => $dto]);
        //return $pdf->stream();
        return $pdf->download("$numero_orden.pdf");
    }


    //Consumo desde el Api
    public function listarOrdenes()
    {
        $ordenes = new Orden();
        return $ordenes->Listar();

    }

    public function listarProductos($numeroOrden)
    {
        $producto = new Producto();
        return response()->json($producto->porNumeroOrden($numeroOrden));
    }



}
