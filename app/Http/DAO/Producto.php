<?php

namespace App\Http\DAO;

use DB;

class Producto
{


    public function actualizarProcesos($sku, $values)
    {
        DB::beginTransaction();
        DB::delete("DELETE FROM ProcesoProducto WHERE sku=:sku", [':sku' => $sku]);
        if ($values != '') {
            DB::insert("insert into ProcesoProducto (id_proceso,sku,orden) values $values");
        }
        DB::commit();

    }


    public function existeProducto($sku)
    {

        $sql = "SELECT * FROM Producto WHERE  sku=:sku";

        return DB::select($sql, ["sku" => $sku]);

    }

    public function insertar($sku)
    {

        $sql = "INSERT INTO Producto (sku) VALUES(:sku)";

        DB::update($sql, [ "sku" => $sku]);


    }


    public function listarProcesosPorSKU($sku)
    {
        $sql = "
                       SELECT                          
                         producto.orden,
                         proceso.descripcion,
                         proceso.id_proceso,
						 proceso.es_acabado
                                    FROM  (SELECT  a.sku,
                                            a.orden,
                                            a.id_proceso 
                                            FROM ProcesoProducto a
                                            WHERE a.sku=:sku) AS producto
                            RIGHT JOIN (SELECT 
                                        b.id_proceso,
                                        b.descripcion,
										b.es_acabado
                                        FROM Proceso b) AS proceso ON (proceso.id_proceso=producto.id_proceso)
                                        ORDER BY orden;";
        return DB::select($sql, ["sku" => $sku]);
    }

    public function listarTotalProcesos()
    {

        $sql = "SELECT 
                    p.sku,
                    count(1) total 
                    FROM Producto p
                    JOIN ProcesoProducto pp ON (p.sku=pp.sku)
                    GROUP BY p.sku";

        return  DB::select($sql);

    }


    //-------------------------------------------------------------------------------------

//    public function porNumeroOrden($numeroOrden)
//    {
//        $sql = "SELECT
//                            a.id_producto,
//                             a.especificacion,
//                             a.sku,
//                             b.nombre,
//                             a.cantidadordenada
//                              FROM Productos a
//                             JOIN  Items b ON (b.sku=a.sku)
//                             WHERE orden_numero=:numeroOrden";
//        return DB::select($sql, [":numeroOrden" => $numeroOrden]);
//    }
//
//    public function porNumeroOrdenSecuencia($numeroOrden)
//    {
//        $sql = "SELECT a.id_producto,
//                            a.cantidadordenada,
//                            a.sku,
//                            a.especificacion,
//                            b.actual,
//                            b.id_proceso,
//                            b.procesado,
//                            b.secuencia,
//                            a.orden_numero,
//                            d.nombre,
//                            c.nombre AS nombreProceso
//                             FROM Productos a
//                             JOIN Produccion b ON (a.id_producto=b.id_producto)
//                             JOIN Procesos c ON (c.id_proceso=b.id_proceso)
//                             JOIN Items d ON (d.sku=a.sku)
//                             WHERE 1=1
//                              AND  a.orden_numero=:orden_numero
//                             ORDER BY a.id_producto,b.secuencia";
//
//        return DB::select($sql, [":orden_numero" => $numeroOrden]);
//    }
//
//    public function terminoProduccion($id_producto)
//    {
//        $bandera = false;
//        $sql = "SELECT COUNT(1) AS total,SUM(procesado) AS procesado FROM Produccion
//              WHERE id_producto=:id_producto ";
//        $data = DB::select($sql, [":id_producto" => $id_producto]);
//        if ($data == null) return false;
//        if ($data[0]->total == $data[0]->procesado) {
//            $bandera = true;
//        }
//        return $bandera;
//
//
//    }
//
//    public function obtenerporID($id_producto)
//    {
//        $sql = "SELECT
//                    a.id_producto,
//                    a.sku,
//                    b.nombre
//                    FROM Productos a
//                    JOIN Items b ON (b.sku=a.sku)
//                    WHERE id_producto=:id_producto";
//        return DB::select($sql, [":id_producto" => $id_producto]);
//    }
//
//    public function reasignarProcesos($id_producto, $id_proceso)
//    {
//        $sql = "EXEC sp_ReasignarProceso :id_producto,:id_proceso";
//        DB::statement($sql, [":id_producto" => $id_producto, ":id_proceso" => $id_proceso]);
//    }
//
////El proceso Actual
//    public function listarconProceso($id_producto)
//    {
//        $sql = "SELECT a.id_proceso,b.nombre,a.actual FROM Produccion a
//            JOIN Procesos b ON (b.id_proceso=a.id_proceso)
//            WHERE 1=1
//            AND a.id_producto=:id_producto";
//
//        return DB::select($sql, [":id_producto" => $id_producto]);
//
//    }
//
////Todos los procesos
//    public function listarProcesos($id_producto)
//    {
//        $sql = "SELECT
//		pr.id_proceso,
//		pr.nombre,
//		p.secuencia
//			FROM
//				(SELECT
//				 a.id_proceso,
//				 a.secuencia
//				  FROM Produccion a
//				 JOIN Procesos b ON (a.id_proceso=b.id_proceso)
//				 WHERE a.id_producto=:id_producto) p
//				 RIGHT JOIN Procesos pr ON (pr.id_proceso=p.id_proceso)
//				 ORDER BY secuencia ";
//
//        return DB::select($sql, ["id_producto" => $id_producto]);
//    }
//
//    public function actualizarProcesos($id_producto, $info)
//    {
//        DB::beginTransaction();
//        DB::update("DELETE FROM Produccion WHERE id_producto=:id_producto", ["id_producto" => $id_producto]);
//        if ($info != '') {
//            DB::insert("insert into Produccion (id_producto,id_proceso,secuencia,procesado,actual) values $info");
//            DB::update("UPDATE Produccion SET actual=1 WHERE secuencia=1 AND id_producto=:id_producto ", ["id_producto" => $id_producto]);
//        }
//        DB::commit();
//    }
//
//    public function porProcesar($id_proceso)
//    {
//        $sql = "SELECT
//	 a.id_producto,
//	  a.cantidadordenada,
//	  a.especificacion,
//	  a.orden_numero,
//	  a.sku,
//	  b.pliego,
//	  b.subpliego,
//	  b.numero_copias,
//	  e.descripcion,
//	  e.nombre nombreproducto
//	   FROM Productos a
//	 JOIN PliegoProductos b ON (a.id_producto=b.id_producto)
//	 JOIN Pliegos c ON (c.pliego=b.pliego)
//	 JOIN Produccion d ON (d.id_producto=a.id_producto)
//	 join Items e on (e.sku=a.sku)
//	 WHERE 1=1
//	 AND d.actual=1
//	 AND d.id_proceso=:id_proceso";
//        return DB::select($sql, [":id_proceso" => $id_proceso]);
//    }

}
