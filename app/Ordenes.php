<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
 
   public function cliente()
    {
        return $this->hasOne("App\Clientes", "ClienteID", "ClienteID");
    }
    public function ordenitems(){
        return $this->hasMany("App\Ordenitems", "OrdenID", "OrdenID");
    }

}
