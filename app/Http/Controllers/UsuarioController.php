<?php

namespace App\Http\Controllers;

use App\Http\DAO\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('catalogos_usuarios',["except"=>"listar"]);
    }

    public function index()
    {
        return View("pages.dashboard.catalogos.usuarios.index");
    }


    public function add()
    {
        $usuario = new Usuario();
        return View("pages.dashboard.catalogos.usuarios.add", ['modelo' => $usuario->ListarRol()]);
    }

    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario();
        $dto = new \StdClass;
        $dto->nombre = $request->nombre;
        $dto->correo = $request->correo;
        $dto->login = $request->login;
        $dto->password = $request->password;
        $dto->departamento = $request->departamento;
        $dto->activo = $request->activo;
        $dto->rol = $request->rol;
        $usuario->Guardar($dto);
        return redirect('dashboard/catalogos/usuarios');
    }

    public function edit($id)
    {
        $modelo = (new Usuario())->buscarporID($id);
        if (!$modelo) {
            return abort(404);
        }
        return View("pages.dashboard.catalogos.usuarios/edit", ["modelo" => $modelo[0], "roles" => (New Usuario())->ListarRol()]);

    }

    public function update(Request $request)
    {

        $usuario = new Usuario();
        $dto = new \StdClass();
        $dto->nombre = $request->nombre;
        $dto->login = $request->login;
        $dto->departamento = $request->departamento;
        $dto->correo = $request->correo;
        $dto->tipousuariocrece = $request->tipousuariocrece;
        $dto->estatuscrece = $request->estatuscrece ? '1' : '0';
        $dto->Id_Usuario = $request->Id_Usuario;

        if ($request->password != '') {
            $dto->password = $request->password;
            $usuario->ActualizarconPassword($dto);
        } else {
            $usuario->ActualizarsinPassword($dto);
        }
        return redirect('dashboard/catalogos/usuarios');

    }

//API
    public function listar()
    {
        $usuario = new Usuario();
        return  response()->json($usuario->Listar());
    }

}
