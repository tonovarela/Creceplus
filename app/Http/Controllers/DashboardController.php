<?php

namespace App\Http\Controllers;



class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("autenticado");
    }

    public function index()
    {
        return View("pages.dashboard.index");
    }
}
