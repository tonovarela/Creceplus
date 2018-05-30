<?php
namespace App\Http\DAO;

use DB;

class Producccion
{
    public function TotalProcesosActuales()
    {
//        $sql = "SELECT
//                x.id_proceso,
//                x.nombre,
//                ISNULL(y.total,0) total
//                FROM Procesos x
//                LEFT JOIN
//               (SELECT
//                 count(1) total,
//                 b.id_proceso,
//                 b.nombre
//                 FROM Produccion a
//                 JOIN Procesos b ON (b.id_proceso=a.id_proceso)
//                 WHERE a.actual=1
//                 GROUP BY b.nombre,b.id_proceso) y ON (y.id_proceso=x.id_proceso);";
//
//
//        return DB::select($sql);
    }
}