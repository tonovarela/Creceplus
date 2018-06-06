<?php

namespace App\Http\DAO;

use DB;

class Estacion
{

    public function Listar()
    {
        return DB::select("SELECT * FROM  Estaciones");
    }

    public function buscar($EstacionID)
    {
        return DB::select("SELECT * FROM Estaciones WHERE id_estacion=:EstacionID ", [":EstacionID" => $EstacionID]);
    }

    public function actualizar($maquina)
    {
        DB::update("UPDATE Estaciones SET nombre=:nombre ,activo=:activo WHERE id_estacion=:estacionID ",
            [":nombre" => $maquina->nombre, ":activo" => $maquina->activo, ":estacionID" => $maquina->id_estacion]);
    }

    public function guardar($maquina)
    {
        DB::insert("INSERT INTO Estaciones (nombre,activo) VALUES(:nombre,:activo);",
            [":nombre" => $maquina->nombre, ":activo" => $maquina->activo]);
    }


    public function listarPorProceso($id_proceso)
    {
        $sql = "SELECT 
                     a.id_estacion,
                     a.nombre,
                     c.descripcion AS nombreProceso
                      FROM Estaciones a
                     JOIN ProcesoEstaciones b ON (a.id_estacion=b.id_estacion)
                     JOIN Proceso c ON (c.id_proceso=b.id_proceso)
                     WHERE 1=1
                     AND b.id_proceso=:id_proceso
                     AND a.activo=1";

        return DB::select($sql, [":id_proceso" => $id_proceso]);


    }


}
