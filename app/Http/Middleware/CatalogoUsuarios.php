<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CatalogoUsuarios
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Session::get('entorno')->mnu_catalogos_usuarios==0 ) {
            return response(View("errors.permisoinsuficiente",["permiso_requerido"=>"mnu_catalogos_usuario"]));

        }
        return $next($request);


    }
}
