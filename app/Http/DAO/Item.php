<?php

namespace App\Http\DAO;

use DB;

class Item
{

    public function ListarProcesos($id_item)
    {
        $sql = "select                          
                         item.secuencia,
                         proceso.nombre,
                         proceso.id_proceso
                                    from  (select  a.id_item,
                                            a.secuencia,
                                            a.id_proceso 
                                            from Procesoitems a
                                            where a.id_item=:id_item) as item
                            right join (select 
                                        b.id_proceso,
                                        b.nombre
                                        from Procesos b) as proceso on (proceso.id_proceso=item.id_proceso)
                                        order by secuencia
										";
        return DB::select($sql, [":id_item" => $id_item]);
    }

    public function obtenerporSKU($sku)
    {
        $sql = "select * from Items where sku=:sku";
        return DB::select($sql, [":sku" => $sku]);
    }

    public function existeSKU($sku, $id_item)
    {
        $sql = "select * from Items where sku=:sku and id_item<>:id_item";
        return DB::select($sql, [":sku" => $sku, ":id_item" => $id_item]);
    }

    public function obtenerPorID($id)
    {
        return DB::select("select * from Items where id_item=:id_item ", [":id_item" => $id]);
    }

    public function Agregar($item)
    {

        $sql = "insert into Items (nombre,descripcion,sku,id_tipopapel,id_categoria,id_medida,activo) 
                values(:nombre,:descripcion,:sku,:id_tipopapel,:id_categoria,:id_medida,:activo)";
        return DB::insert($sql, [":nombre" => $item->nombre,
            ":descripcion" => $item->descripcion,
            ":sku" => $item->sku,
            ":id_tipopapel" => $item->id_tipopapel,
            ":id_categoria" => $item->id_categoria,
            ":id_medida" => $item->id_medida,
            ":activo" => $item->activo
        ]);

    }

    public function Actualizar($item)
    {
        $sql = "update Items set nombre=:nombre,
                                      sku=:sku,
                                      descripcion=:descripcion,
                                      id_tipopapel=:id_tipopapel,
                                      id_categoria=:id_categoria,
                                      id_medida=:id_medida,
                                      activo=:activo
                                       where id_item=:id_item ";
        DB::update($sql, [":nombre" => $item->nombre,
            ":sku" => $item->sku,
            ":descripcion" => $item->descripcion,
            ":id_tipopapel" => $item->id_tipopapel,
            ":id_categoria" => $item->id_categoria,
            ":id_medida" => $item->id_medida,
            ':id_item' => $item->id_item,
            ':activo' => $item->activo

        ]);


    }

    public function Listar()
    {
        $sql = "select 
 a.id_item,
a.descripcion,
a.nombre,
a.sku,
a.activo,
b.nombre as nombrepapel,
b.gramaje,
c.nombre as nombrecategoria,
d.descripcion as nombremedida,
(select COUNT(1) from ProcesoItems x where x.id_item=a.id_item) as numprocesos
 from Items a
 join TipoPapeles b on (b.id_tipopapel=a.id_tipopapel)
 join Categorias c on (c.id_categoria=a.id_categoria)
 join Medidas d on (d.id_medida=a.id_medida)";
        return DB::select($sql);

    }

    public function ActualizarProcesos($id_item, $values)
    {
        DB::beginTransaction();
        DB::delete("delete from ProcesoItems where id_item=:id_item", [':id_item' => $id_item]);
        if ($values != '') {
            DB::insert("insert into ProcesoItems (id_proceso,id_item,secuencia) values $values");
        }
        DB::commit();

    }




   public function obtenerPorNumeroOrden($numero_orden){
        $sql="select a.*,
								 b.sku
								 from Item a
								 left join Producto b on (b.sku=a.sku)
								  where a.numero_orden=:numero_orden";
        return DB::select($sql,[":numero_orden"=>$numero_orden]);

   }


}
