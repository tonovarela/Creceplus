<?php
namespace App\Http\DAO;

use DB;

class Proceso
{
    public function Listar()
    {
        return DB::select ("select * from Proceso");
    }
    public function ProcesosItem($ItemID)
    {

if (!DB::select("select a.* from Items a
                        where a.ItemID=:ItemID",[":ItemID"=>$ItemID])){
                            return array("mensaje"=>"No existe el Item ");
                        }

        return DB::select("select 
                            item.ItemID,
                            item.Secuencia,
                            proceso.Nombre,
                            proceso.ProcesoID
                            from  (select a.ItemID,
                                            a.Secuencia,
                                            a.ProcesoID 
                                    from Procesoitems a
                                    where a.ItemID=:ItemID) as item
                            right join (select 
                                        b.ProcesoID,
                                        b.Nombre
                                        from Procesos b) as proceso on (proceso.ProcesoID=item.ProcesoID)",[":ItemID"=>$ItemID]);
    }

}
