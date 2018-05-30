<h1>Orden</h1>
<p> <b>Número: </b>{{$data->orden->numero_orden}}</p>
<p> <b>Método de envio : </b>{{$data->orden->tipo_envio}}</p>
<p> <b>Fecha  : </b>{{$data->orden->fechaorden}}</p>
<hr>
<h2>Cliente</h2>
<p><b>Nombre: </b>{{$data->orden->nombre}}  {{$data->orden->apellidos}}</p>
<p><b>Email:  </b>{{$data->orden->email}}</p>
{{--<p><b>Compañia:  </b>{{$data->orden->compania}}</p>--}}
<p><b>Calle:  </b>{{$data->orden->calle}}</p>
<p><b>Código Postal:  </b>{{$data->orden->codigo_postal}}</p>
<p><b>Estado: </b>{{$data->orden->estado}}</p>
{{--<p><b>Pais :</b>{{$data->orden->pais}}</p>--}}
<hr>
<h1>Productos</h1>
<hr>
    @foreach($data->items  as $item)
        {{--<p><b>ID producto</b>: {{$item->id_producto}}</p>--}}
        <p><b>SKU </b>: {{$item->sku}}</p>
        {{--<p><b>Nombre</b> : {{$item->nombre}}</p>--}}
        <p><b>Cantidad ordenada</b> : {{$item->cantidad}}</p>
        <table border="1">
        <tr><td>Páginas</td> <td>{{$item->paginas}}</td></tr>
        <tr><td>Color</td><td>{{$item->color}}</td></tr>
        <tr><td>Encuadernado</td><td>{{$item->encuadernado}}</td></tr>
        <tr><td>Acabado</td><td>{{$item->acabado}}</td></tr>
        <tr><td>Corte</td><td>{{$item->corte}}</td></tr>
        <tr><td>Orientacion</td><td>{{$item->orientacion}}</td></tr>
        <tr><td>Portadas</td><td>{{$item->portadas}}</td></tr>
        <tr><td>Papel</td><td>{{$item->papel}}</td></tr>
        <tr><td>Formato</td><td>{{$item->formato}}</td></tr>
        </table>

    @endforeach


