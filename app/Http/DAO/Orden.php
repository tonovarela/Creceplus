<?php

namespace App\Http\DAO;

use DB;

class Orden
{

    public function obtenerPorNumero($numero_orden)
    {
        $sql = "SELECT 
                                a.numero_orden,	                                
                                a.tipo_envio,								
                                a.id_cliente,
                                b.nombre,
                                b.apellidos,
                                b.email,
                                a.calle,
		                        a.codigo_postal,
		                        a.estado,
								a.telefono,
								convert(VARCHAR,a.fecha_registro,103)+' '+convert(VARCHAR,a.fecha_registro,108)  AS fechaorden  		                       		                                                        
                                 FROM Orden a
                                 JOIN Cliente b ON (a.id_cliente=b.id_cliente)                                 
								 WHERE numero_orden=:numero_orden                                
                                 ";

        return DB::select($sql, [":numero_orden" => $numero_orden]);
    }

    public function Listar()
    {
        $sql = "SELECT 
                        a.numero_orden,
                        a.id_cliente,
                        a.calle,
                        a.codigo_postal,
                        b.email,
                        b.nombre,
                        b.apellidos,
						 a.telefono,
						 a.estado,
                        (SELECT count(1) FROM Item WHERE numero_orden=a.numero_orden) total_items , --Items por Orden
                        (SELECT count (DISTINCT x.id_item ) FROM Item x 
                                JOIN Orden y ON(y.numero_orden=x.numero_orden)
                                JOIN Produccion z ON (z.id_item=x.id_item)		
                                WHERE x.numero_orden=a.numero_orden
                        ) total_produccion   ,                                    --Cuantos item hay en produccion
                        a.tipo_envio,
                        convert(varchar,a.fecha_registro,100) as fecha_registro
                         FROM Orden a 
                          JOIN Cliente b ON (b.id_cliente=a.id_cliente)	
 ";
             return DB::select($sql);
    }
}
