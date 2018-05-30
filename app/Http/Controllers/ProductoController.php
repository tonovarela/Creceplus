<?php

namespace App\Http\Controllers;

use App\Http\DAO\Producto;
use Illuminate\Http\Request;


class ProductoController extends Controller
{


    public function index()
    {
        return View("pages.dashboard.catalogos.productos.index");
    }


    public function showProcesos($sku)
    {


        return View("pages.dashboard.catalogos.productos.procesos", ["modelo" => $sku]);
    }


    public function listarProcesosPorSKU($sku)
    {
        $producto = new Producto();
        return $producto->listarProcesosPorSKU($sku);
    }


    public function listarTotalProcesos(){
        $dao= new Producto();
        return $dao->listarTotalProcesos();


    }


    public function procesosUpdate(Request $request)
    {
        $info = (object)$request->all()['info'];
        $producto = (object)$request->all()['producto'];


        $dao = new Producto();

      if (!$dao->existeProducto($producto->sku)){
          $dao->insertar($producto->sku);
      }

       $values = ' ';
       foreach ($info as $item) {
           $values .= "(" . $item['id_proceso'] . ",'" . $item['sku'] . "'," . $item['orden'] . "),";

       };
       $values = substr($values, 0, -1);
       $dao->actualizarProcesos($producto->sku, $values);

        return $producto->sku;


   }






//    public function obtenerPorOrden($numeroOrden)
//    {
//        $producto = new Producto();
//        $productos = $producto->porNumeroOrden($numeroOrden);
//        if ($productos == null) {
//
//            return View("errors.mensaje", ["mensaje" => "Orden no existe o no tiene productos asociados"]);
//        }
//        return View("pages.dashboard.productos.index", ["orden_numero" => $numeroOrden, "productos" => $productos]);
//    }
//
//    public function productoConProcesos($orden_numero, $idproducto)
//    {
//        $data = new Producto();
//        $producto = $data->obtenerporID($idproducto)[0];
//        $procesos = $data->listarconProceso($idproducto);
//        $terminoProduccion = $data->terminoProduccion($idproducto);
//        return View("pages.dashboard.productos.procesos", ["procesos" => $procesos,
//            "producto" => $producto,
//            "terminoProduccion" => $terminoProduccion,
//            "orden_numero" => $orden_numero
//        ]);
//    }
//
//    public function rutaRecomposicion($idproducto)
//    {
//        $data = new Producto();
//        $producto = $data->obtenerporID($idproducto)[0];
//        return View("pages.dashboard.productos.recomposicion", ["producto" => $producto]);
//    }
//
//    public function storeProcesos(Request $request)
//    {
//        $producto = new Producto();
//        $producto->reasignarProcesos($request->id_producto, $request->id_proceso);
//        return Redirect("dashboard/orden/$request->orden_numero/detalle");
//    }
//
//
//    public function porProcesar($id_proceso)
//    {
//        $productos = new Producto();
//        return $productos->porProcesar($id_proceso);
//
//    }


}
