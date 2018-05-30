<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenitems extends Model
{
    public function item(){
        return $this->hasOne("App\Items","ItemID","ItemID");
    }
}
