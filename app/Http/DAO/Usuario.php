<?php

namespace App\Http\DAO;

use Illuminate\Support\Facades\DB;

class Usuario
{
    public function Login($nombre, $password)
    {
        $sql = "SELECT 
                      a.login AS usuario,
                      a.nombre AS nombre ,
                      c.descripcion AS rol,
                      b.mnu_catalogos ,
                      b.mnu_catalogos_maquinas,
                      b.mnu_catalogos_procesos,
                      b.mnu_catalogos_usuarios,
                      b.mnu_catalogos_items,
                      b.mnu_envios,
                      b.mnu_ordenes,
                      b.mnu_produccion,
                      b.mnu_produccion_acabadom,
                      b.mnu_produccion_suajado,
                      b.mnu_produccion_buv,
                      b.mnu_produccion_calidad,
                      b.mnu_produccion_corte,
                      b.mnu_produccion_ctp,
                      b.mnu_produccion_doblez,
                      b.mnu_produccion_engrapado,
                      b.mnu_produccion_laminado,
                      b.mnu_produccion_offset,
                      b.mnu_produccion_planeacion,
                      b.mnu_reportes     
                      FROM v_catUsuarios a
                      LEFT JOIN permisos_usuarios b ON (a.tipousuariocrece=b.id_tipousuario)
                      LEFT JOIN tipos_usuarios c ON (c.id_tipousuario=b.id_tipousuario)
                      WHERE a.login=:nombre                      
                      AND password=:password
                      AND a.estatuscrece='1' AND a.estatus='ACTIVO'";
        return DB::select($sql, [":nombre" => $nombre, ":password" => $password]);
        //return DB::select("select * from Usuarios where nombre=:nombre  and password=:password",
        //[":nombre"=>$nombre,":password"=>$password]);
    }
    public function Listar()
    {
        return DB::select("SELECT * FROM v_catUsuarios WHERE estatus='ACTIVO' ");
    }
    public function ListarRol()
    {
        return DB::select("SELECT * FROM tipos_usuarios");
    }
    public function buscarporID($id)
    {
        $sql = "SELECT * FROM v_catUsuarios WHERE Id_Usuario=:id";
        return DB::select($sql, [":id" => $id]);
    }
    public function Guardar($usuario)
    {

        DB::insert("INSERT INTO v_catUsuarios (nombre,login,password,departamento,correo,estatus,tipousuariocrece,estatuscrece)
                      VALUES(:nombre,:login,:password,:departamento,:correo,'ACTIVO',:tipousuariocrece,:estatuscrece);",
            [":nombre" => $usuario->nombre,
                ":login" => $usuario->login,
                ":password" => $usuario->password,
                ":departamento" => $usuario->departamento,
                ":correo" => $usuario->correo,
                ":tipousuariocrece" => $usuario->tipousuariocrece,
                ":estatuscrece" => $usuario->estatuscrece == 'on' ? '1' : '0']
        );
    }
    public function ActualizarconPassword($usuario)
    {


        $sql = "UPDATE v_catUsuarios SET nombre='$usuario->nombre',
                                      login='$usuario->login',  
                                      password='$usuario->password',   
                                      departamento='$usuario->departamento',
                                      correo='$usuario->correo',
                                      tipousuariocrece='$usuario->tipousuariocrece',
                                      estatuscrece='$usuario->estatuscrece' 
                                      WHERE Id_Usuario='$usuario->Id_Usuario'";

        DB::update($sql
//            , [
//            ':nombre' => $usuario->nombre,
//            ':login' =>$usuario->nombre,
//            ':password' => $usuario->password,
//            ':departamento' => $usuario->departamento,
//            ':correo' => $usuario->correo,
//            ':tipousuariocrece' => $usuario->tipousuariocrece,
//            ':estatuscrece' => $usuario->estatuscrece,
//            ':Id_usuario' => $usuario->Id_Usuario
//                ]
        );
    }
    public function ActualizarsinPassword($usuario)
    {

        $sql = "UPDATE v_catUsuarios SET nombre=:nombre,
                                      login=:login,     
                                      departamento=:departamento,
                                      correo=:correo,
                                      tipousuariocrece=:tipousuariocrece,
                                      estatuscrece=:estatuscrece 
                                      WHERE Id_Usuario=:Id_Usuario
                                      ";


        DB::update($sql, [
            ':nombre' => $usuario->nombre,
            ':login' => $usuario->login,
            ':departamento' => $usuario->departamento,
            ':correo' => $usuario->correo,
            ':tipousuariocrece' => $usuario->tipousuariocrece,
            ':estatuscrece' => $usuario->estatuscrece,
            ':Id_Usuario' => $usuario->Id_Usuario,
        ]);
    }

}
