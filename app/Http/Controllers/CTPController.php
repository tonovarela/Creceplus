<?php

namespace App\Http\Controllers;

use App\Http\DAO\Estacion;
use Illuminate\Http\Request;

class CTPController extends Controller
{
    public function index(){
        return View('pages.dashboard.produccion.ctp');
    }
}
