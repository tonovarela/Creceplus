<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class Autenticado
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

        if (!Session::has("usuario")) {
            Session::flash("logout", "Es necesario iniciar sesión");
            return Redirect::to("acceso/login");
        }
        return $next($request);
    }
}
