<?php

namespace App\Http\DAO;

use DB;

class Item
{

    public function ListarProcesos()
    {
        $sql = "SELECT 
                    proceso.id_proceso,
                    proceso.descripcion,
                    pro.orden
            
                 FROM       (SELECT 
                        id_proceso,
                        orden
                        FROM Produccion  
                        WHERE id_item=:id_item ) AS pro
              RIGHT JOIN (SELECT 
                            b.id_proceso,
                            b.descripcion
                            FROM Proceso b) AS proceso ON (proceso.id_proceso=pro.id_proceso)
            WHERE 1=1
            ORDER BY pro.orden 
";
        return DB::select($sql, [":id_item" => $id_item]);
    }


    public function PorProcesar($id_proceso)
    {
        $sql = "SELECT 
	 a.id_item,
	 a.cantidad,
	 a.sku,
	 c.nombre_pliego,
	 c.subpliego,
	 c.copias_producidas,
	 c.copias_requeridas,
	 a.numero_orden	 	 	 	 
	  FROM Item a
	  JOIN Producto b ON (b.sku=a.sku)
	  JOIN PliegoItem c ON (c.id_item=a.id_item)
	  JOIN Pliego d ON (d.nombre=c.nombre_pliego)
	  JOIN Produccion e ON (e.id_item=a.id_item)
	  WHERE 1=1
	  AND e.actual=1
	  AND e.id_proceso=:id_proceso";

        return DB::select($sql, [":id_proceso" => $id_proceso]);


    }

//    public function ListarProcesos($id_item)
//    {
//        $sql = "SELECT
//                         item.secuencia,
//                         proceso.nombre,
//                         proceso.id_proceso
//                                    FROM  (SELECT  a.id_item,
//                                            a.secuencia,
//                                            a.id_proceso
//                                            FROM Procesoitems a
//                                            WHERE a.id_item=:id_item) AS item
//                            RIGHT JOIN (SELECT
//                                        b.id_proceso,
//                                        b.nombre
//                                        FROM Procesos b) AS proceso ON (proceso.id_proceso=item.id_proceso)
//                                        ORDER BY secuencia
//										";
//        return DB::select($sql, [":id_item" => $id_item]);
//    }
//
//    public function obtenerporSKU($sku)
//    {
//        $sql = "SELECT * FROM Items WHERE sku=:sku";
//        return DB::select($sql, [":sku" => $sku]);
//    }
//
//    public function existeSKU($sku, $id_item)
//    {
//        $sql = "SELECT * FROM Items WHERE sku=:sku AND id_item<>:id_item";
//        return DB::select($sql, [":sku" => $sku, ":id_item" => $id_item]);
//    }
//
//    public function obtenerPorID($id)
//    {
//        return DB::select("SELECT * FROM Items WHERE id_item=:id_item ", [":id_item" => $id]);
//    }
//
//    public function Agregar($item)
//    {
//
//        $sql = "INSERT INTO Items (nombre,descripcion,sku,id_tipopapel,id_categoria,id_medida,activo)
//                VALUES(:nombre,:descripcion,:sku,:id_tipopapel,:id_categoria,:id_medida,:activo)";
//        return DB::insert($sql, [":nombre" => $item->nombre,
//            ":descripcion" => $item->descripcion,
//            ":sku" => $item->sku,
//            ":id_tipopapel" => $item->id_tipopapel,
//            ":id_categoria" => $item->id_categoria,
//            ":id_medida" => $item->id_medida,
//            ":activo" => $item->activo
//        ]);
//
//    }
//
//    public function Actualizar($item)
//    {
//        $sql = "UPDATE Items SET nombre=:nombre,
//                                      sku=:sku,
//                                      descripcion=:descripcion,
//                                      id_tipopapel=:id_tipopapel,
//                                      id_categoria=:id_categoria,
//                                      id_medida=:id_medida,
//                                      activo=:activo
//                                       WHERE id_item=:id_item ";
//        DB::update($sql, [":nombre" => $item->nombre,
//            ":sku" => $item->sku,
//            ":descripcion" => $item->descripcion,
//            ":id_tipopapel" => $item->id_tipopapel,
//            ":id_categoria" => $item->id_categoria,
//            ":id_medida" => $item->id_medida,
//            ':id_item' => $item->id_item,
//            ':activo' => $item->activo
//
//        ]);
//
//
//    }
//
//    public function Listar()
//    {
//        $sql = "SELECT
//                 a.id_item,
//                a.descripcion,
//                a.nombre,
//                a.sku,
//                a.activo,
//                b.nombre AS nombrepapel,
//                b.gramaje,
//                c.nombre AS nombrecategoria,
//                d.descripcion AS nombremedida,
//(SELECT COUNT(1) FROM ProcesoItems x WHERE x.id_item=a.id_item) AS numprocesos
// FROM Items a
// JOIN TipoPapeles b ON (b.id_tipopapel=a.id_tipopapel)
// JOIN Categorias c ON (c.id_categoria=a.id_categoria)
// JOIN Medidas d ON (d.id_medida=a.id_medida)";
//        return DB::select($sql);
//
//    }
//
//    public function ActualizarProcesos($id_item, $values)
//    {
//        DB::beginTransaction();
//        DB::delete("DELETE FROM ProcesoItems WHERE id_item=:id_item", [':id_item' => $id_item]);
//        if ($values != '') {
//            DB::insert("insert into ProcesoItems (id_proceso,id_item,secuencia) values $values");
//        }
//        DB::commit();
//
//    }
//
//
//    public function obtenerPorNumeroOrden($numero_orden)
//    {
//        $sql = "SELECT a.*,
//								 b.sku
//								 FROM Item a
//								 LEFT JOIN Producto b ON (b.sku=a.sku)
//								  WHERE a.numero_orden=:numero_orden";
//        return DB::select($sql, [":numero_orden" => $numero_orden]);
//
//    }


}
