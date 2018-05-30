<?php

namespace App\Http\DAO;

use Illuminate\Support\Facades\DB;

class Papel
{
    public function Listar()
    {
        $sql = "select * from TipoPapeles";
        return DB::select($sql);
    }
    public function buscarporID($id)
    {
        $sql = "SELECT * FROM TipoPapeles WHERE id_tipopapel=:id_tipopapel";
        return DB::select($sql, [":id_tipopapel" => $id]);
    }
    public function Guardar($tipopapel)
    {
        DB::insert("INSERT into TipoPapeles (nombre,gramaje)
                      VALUES(:nombre,:gramaje)",
            [":nombre" => $tipopapel->nombre,
                ":gramaje" => $tipopapel->gramaje]
        );
    }
    public function Actualizar($tipopapel)
    {
        $sql = "update TipoPapeles 
                      set nombre=:nombre,
                      gramaje=:gramaje                       
                      where id_tipopapel=:id_tipopapel";
        DB::update($sql, [
            ':nombre' => $tipopapel->nombre,
            ':gramaje' => $tipopapel->gramaje,
            ':id_tipopapel' => $tipopapel->id_tipopapel
        ]);
    }
}
