@extends("layout.dashboard")
@section('titulo', 'Máquinas')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    <!-- Main section-->
        <section>
            <!-- Page content-->
            @component('partials.titlemodule')

Estaciones
            @endcomponent
            <div style="padding-left: 20px">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                    <span class="pull-left">
                    <a href="{{ URL::to('dashboard/catalogos/estaciones/create')}}" class="btn btn-success" >
                        <em class="icon-plus"></em>
                        Agregar
                    </a>
                        </span>
                    </div>

                </div>
                <div class="row"  >
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- START table-responsive-->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Activa</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($modelo as $maquina)
                                            <tr>
                                                <td class="col-md-1">
                                                    {{$maquina->id_estacion}}
                                                </td>
                                                <td class="col-md-6">
                                                    {{$maquina->nombre}}
                                                </td>
                                                <td class="col-md-2">
                                                    <em class="fa fa-circle {{$maquina->activo=='1'?'text-success':'text-danger'}}"></em>
                                                </td>
                                                <td class="col-md-2">
                                                    <a class="btn btn-info btn-outline btn-xs"
                                                       href="{{ URL::to('dashboard/catalogos/estaciones/edit/'.$maquina->id_estacion) }}">
                                                        <em class="fa fa-edit"></em>

                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>
    {{--<script src="{{asset('logic/maquinas.js')}}"></script>--}}
    <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>

    </div>
@endsection

