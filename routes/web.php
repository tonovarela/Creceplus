<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", function () {
    return redirect("acceso/login");
});


//Route::get("test/{texto}", "LoginController@test");


Route::group(["prefix" => 'acceso'], function () {
    Route::get('login', "LoginController@index");
    Route::post('login', "LoginController@store");
    Route::get('logout', "LoginController@logout");
});

Route::group(["prefix" => 'dashboard', "middleware" => 'autenticado'], function () {


    Route::get('/', 'OrdenController@index');

    Route::get('orden/{numeroOrden}/impresion', 'OrdenController@detalleImpreso');
    Route::get('orden/{numeroOrden}/productos', 'ProductoController@obtenerPorOrden');
    Route::get('orden/{numeroOrden}/detalle', 'OrdenController@detalle');
    Route::get('orden/{orden_numero}/producto/{idproducto}/procesos', 'ProductoController@productoConProcesos');






    Route::get('producto/{idproducto}/recomposicion', 'ProductoController@rutaRecomposicion');
    Route::post('productos/procesos/store', 'ProductoController@storeProcesos');


    Route::group(["prefix" => 'produccion'], function () {
        Route::get('ctp', 'CTPController@index');
    });

    /* Catalogos  */
    Route::group(["prefix" => 'catalogos'], function () {
        Route::get('procesos', 'ProcesoController@index');

        Route::get('estaciones', 'EstacionController@index');
        Route::get('estaciones/edit/{id}', 'EstacionController@edit');
        Route::post('estaciones/edit/', 'EstacionController@update');
        Route::get('estaciones/create', 'EstacionController@create');
        Route::post('estaciones/store', 'EstacionController@store');

        Route::get('items', 'ItemController@index');
        Route::get('items/add', 'ItemController@add');
        Route::get('items/edit/{id}', 'ItemController@show');
        Route::get('items/procesos/{id}', 'ItemController@showproceso');



        Route::get('usuarios', 'UsuarioController@index');
        Route::get('usuarios/add', 'UsuarioController@add');
        Route::post('usuarios/store', 'UsuarioController@store');
        Route::get('usuarios/edit/{id}', 'UsuarioController@edit')->where('id', '[0-9]+');
        Route::post('usuarios/edit', 'UsuarioController@update');



        Route::get('productos', 'ProductoController@index');
        Route::get('producto/{id}', 'ProductoController@showprocesos');

        /*Route::get('papel', 'PapelController@index');
        Route::get('papel/add', 'PapelController@add');
        Route::post('papel/store', 'PapelController@store');
        Route::get('papel/edit/{id}', 'PapelController@edit');
        Route::post('papel/edit/', 'PapelController@update');*/
    });
    /*   */
    Route::get('asignacion', 'AsignacionController@index');
});
