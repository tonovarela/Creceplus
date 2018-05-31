@extends("layout.dashboard")
@section('titulo', 'Ordenes de producción')
@section('content')
    <div ng-controller="OrdenController" ng-cloak>
        <div id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
             class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 id="myModalLabel" class="modal-title">Cliente </h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-offset-1">
                            <h4 class="text-muted">Nombre </h4>
                            @{{orden.nombre}} @{{ orden.apellidos }}
                            <h4 class="text-muted">Email</h4>
                            @{{ orden.email }}
                            <hr>
                            <address>
                                <strong>@{{ orden.calle }}</strong><br>
                                @{{orden.telefono}}<br>
                                @{{orden.codigo_postal}}<br>
                                @{{orden.estado}}<br>
                            </address>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
        @include('partials.header')
        @include('partials.aside')
        @include('partials.offside')
        <!-- Main section-->
            <section>
                <!-- Page content-->
                {{--@component('partials.titlemodule')--}}
                {{--denes Or--}}

                {{--@endcomponent--}}
                <div style="padding-left: 20px">

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Buscar" ng-model="buscar"/>
                        </div>
                        <div class="col-md-5">
                        <span class="pull-right">

                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <hr>

                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered " style="font-size: 12px">
                                    <tr>
                                        <th> Número</th>

                                        <th>Cliente</th>
                                        <th>Fecha registro</th>
                                        <th>Método envio</th>
                                        <th># Items</th>
                                        <th>Items con ruta de procesos</th>

                                        <th>Imposición</th>
                                        <th>Producción</th>

                                        <th>Detalle</th>

                                    </tr>
                                    <tr ng-repeat="orden in ordenes | filter:buscar">
                                        <td class="col-1">@{{ orden.numero_orden }}
                                        </td>

                                        <td class="col-1">
                                            <div class="center-block label  ">
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#modalCliente"
                                                   class="icon-user-following fa-2x"
                                                   ng-click="infoCliente(orden)"
                                                ></a>
                                            </div>
                                        </td>
                                        <td class="col-2"> @{{ orden.fecha_registro}}</td>
                                        <td class="col-2"> @{{ orden.tipo_envio}}</td>
                                        <td class="col-1">
                                            <div class="text-center">
                                                @{{ orden.total_items }}
                                            </div>
                                        </td>

                                        <td class="col-1">
                                            <div class="col-2  label center-block"
                                                 ng-class="orden.total_produccion==orden.total_items?'label label-success':'label label-danger'">
                                                @{{ orden.total_produccion }}
                                            </div>
                                        </td>

                                        <td class="col-1">
                                            <div class="center-block text-success"
                                                 ng-class="orden.FormacionIMP!=0?' text-success':'text-warning'"
                                            >
                                                @{{ orden.FormacionIMP!=0?' PROCESADO':' PENDIENTE' }}

                                            </div>

                                        </td>
                                        <td class="col-1">
                                            <div class="center-block  text-success"
                                                 ng-class="orden.Produccion!=0?' text-success':'text-warning'"
                                            >
                                                @{{ orden.Produccion!=0?' PROCESADO':' PENDIENTE' }}
                                            </div>


                                        </td>


                                        <td class="col-1">
                                            <div class="center-block label ">
                                                <a href="/dashboard/orden/@{{orden.numero_orden}}/impresion"
                                                   class="text-danger"><em
                                                            class="fa fa-file-pdf-o fa-2x"> </em></a>
                                            </div>
                                        </td>
                                    </tr>

                                </table>

                            </div>
                        </div>


                    </div>


                    <div class="row">


                        <div class="col-md-6 col-md-offset-3 ">
                            <h1>Procesos</h1>
                            <div class="row">
                                <div ng-repeat="(listName, list) in models.procesos " class="col-md-6">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 ng-show="listName=='Asignados'" class="panel-title">
                                                Asignados</h3>
                                            <h3 ng-show="listName=='Lista'" class="panel-title"> Disponibles</h3>
                                        </div>
                                        <ul dnd-list="list" class="list-group" style="min-height: 300px"
                                        >

                                            <li ng-repeat="proceso in list"
                                                dnd-draggable="proceso"
                                                dnd-moved="list.splice($index, 1)"
                                                dnd-effect-allowed="move"
                                                dnd-selected="models.selected = item"
                                                ng-class="{'selected': models.selected === item};"
                                                class="list-group-item"
                                            >


                                                <em class="icon-settings"></em>
                                                <div ng-if="listName=='Asignados'"
                                                     class="pull-right label label-warning">
                                                    @{{ $index+1 }}
                                                </div>
                                                :: @{{ proceso.descripcion}}
                                            </li>
                                            <li class="dndPlaceholder">
                                                Arrastra cualquier proceso
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>
                </div>
            </section>
            {{--<script src="{{asset('logic/main.js')}}"></script>--}}
            <script src="{{asset('logic/controllers/ordenes.js')}}"></script>
            <!-- Page footer-->
            <footer>
                @include("partials.footer")
            </footer>

        </div>


    </div>

@endsection

