@extends("layout.dashboard")
@section('titulo', 'Inicio')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    <!-- Main section-->
        {{--<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet'--}}
        {{--type='text/css'>--}}
        {{--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}
        <link href="{{asset("css/timeline.css")}}" rel="stylesheet">
        <section>
            <div class="content-wrapper">
                <div class="content-heading">
                   <a href="{{URL::to("/dashboard")}}"><em class="fa  fa-arrow-left"></em></a>
                    Orden de Producción {{$orden_numero}}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            @foreach($data as $producto)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contenedor-timeline">
                                            <div class="info">
                                                <h4>{{$producto->nombre}}</h4>
                                            </div>
                                            <br>
                                            <ul class="lineatiempo">
                                                <li class="li">
                                                    <div class="timestamp">
                                                    </div>
                                                    <div class="space">
                                                        <div class="btn-group mb-sm">
                                                            <button type="button" data-toggle="dropdown"
                                                                    class="btn btn-lg dropdown-toggle btn-default btn-oval"
                                                                    aria-expanded="false">
                                                                <em class="fa fa-gears"></em>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul role="menu" class="dropdown-menu">
                                                                <li>
                                                                    <a href="/dashboard/orden/{{$orden_numero}}/producto/{{$producto->id_producto}}/procesos">Reasignar
                                                                        proceso</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/dashboard/producto/{{$producto->id_producto}}/recomposicion">Recomposición
                                                                        de la ruta de
                                                                        procesos </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                @foreach($producto->Procesos as $proceso )
                                                    <li class="li  {{$proceso->procesado==1?"complete":""}} {{$proceso->actual==1?"actual":""}} ">
                                                        <div class="timestamp">
                                                            <span class="author">{{$proceso->nombreProceso}}</span>
                                                        </div>
                                                        <div class="status">
                                                            @if($proceso->procesado==1)
                                                                <h4>Procesado </h4>
                                                            @else
                                                                @if($proceso->actual==1)
                                                                    <h4>Actual </h4>
                                                                @else
                                                                    <h4>Pendiente </h4>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>


                    </div>
                </div>
            </div>


        </section>
        <footer>
            @include("partials.footer")
        </footer>
    </div>
@endsection
