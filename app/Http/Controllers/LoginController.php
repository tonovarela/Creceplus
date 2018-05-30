<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\DAO\Usuario;
use Redirect;
use Session;
use Validator;
use PDF;
use App;

class LoginController extends Controller
{

    public function index()
    {
        if (Session::has('entorno')) {
            return redirect("dashboard");
        }
        return View('pages.acceso.login');
    }

    public function store(LoginRequest $request)
    {
        $usuario = new Usuario();
        $data = $usuario->Login($request->usuario, $request->password);
        if ($data) {
            if ($data[0]->rol == null) {
                Session::flash("login", "Usuario sin permisos asignados a este sistema");
                return redirect("acceso/login");
            }
            Session::put("usuario",$data[0]->nombre);
            Session::put("entorno",$data[0]);
            return redirect("dashboard");
        } else {
            Session::flash("login", "Usuario no válido");
            return redirect("acceso/login");
        }
    }

    public function logout()
    {
        if (Session::has("entorno")){
            Session::flush();
            Session::flash("logout", "La sesión se  ha cerrado");
        }
        return redirect("acceso/login");
    }


    /*  Prueba de Peticion AJAX  este metodo se consume desde api/v1/login */

    public function listar()
    {
        $usuario = new Usuario();
        return $usuario->Login("fdsfs", "dfs");
    }

    public function test(Request $request)
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();


        $data = array("texto" => $request->texto);
        $pdf = PDF::loadView('salida', $data);
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');


    }

}
