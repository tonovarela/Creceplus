<?php
/**
 * Created by PhpStorm.
 * User: tonovarela
 * Date: 06/06/2018
 * Time: 10:52 AM
 */

namespace App\Http\DAO;
use DB;

class Produccion
{

    public function TotalProcesosActuales()
    {
        $sql = "SELECT
                x.id_proceso,
                x.descripcion,
                ISNULL(y.total,0) total
                FROM Proceso x
                LEFT JOIN
               (SELECT
                 count(1) total,
                 b.id_proceso,
                 b.descripcion
                 FROM Produccion a
                 JOIN Proceso b ON (b.id_proceso=a.id_proceso)
                 WHERE a.actual=1
                 GROUP BY b.descripcion,b.id_proceso) y ON (y.id_proceso=x.id_proceso);";


        return DB::select($sql);
    }


}