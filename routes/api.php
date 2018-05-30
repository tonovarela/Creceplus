<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Route::get("v1/usuarios",'LoginController@listar');



Route::get("v1/login",'LoginController@listar');
Route::get("v1/orden",'OrdenController@index');





Route::get("v2/producto/listarProcesosPorSKU/{sku}","ProductoController@listarProcesosPorSKU");
Route::get("v2/producto/listarTotalProcesos","ProductoController@listarTotalProcesos");
Route::post("v2/producto/procesosUpdate","ProductoController@procesosUpdate");


Route::get("v2/ordenes","OrdenController@listarOrdenes");






//  ------  Items  -------
Route::get("v1/procesositems/{itemID}",'ItemController@Procesos');
Route::get("v1/itemcatalogo",'ItemController@ItemCatalogo');
Route::get("v1/iteminfo/{id}",'ItemController@ItemInfo');
Route::post("v1/itemsave",'ItemController@store');
Route::post("v1/itemupdate",'ItemController@update');
Route::get("v1/itemlist",'ItemController@ItemList');


//  -----------------------
//Asignacion*/
Route::get("v1/itemlistprocesos/{id_item}",'AsignacionController@listarItemProcesos');
Route::post("v1/itemprocesosupdate",'AsignacionController@updateItemProcesos');
Route::get("v1/productoprocesos/list/{id_producto}",'AsignacionController@listarProductoProcesos');
Route::post("v1/productoprocesos/update",'AsignacionController@updateProductoProcesos');



Route::get("v1/usuarios",'UsuarioController@listar');
Route::get("v1/ordenes","OrdenController@listarOrdenes");
Route::get("v1/orden/productos/{numeroOrden}","OrdenController@listarProductos");



Route::get("v1/totalprocesosactuales","ProduccionController@totalProcesosActuales");


Route::get("v1/estacionesporproceso/{id_proceso}","EstacionController@listarPorProceso");



Route::get("v1/productosporprocesar/{id_proceso}","ProductoController@porProcesar");
