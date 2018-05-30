@extends("layout.dashboard")
@section('titulo', 'Asignación de procesos')

@section('content')
    <div class="App" ng-app="App" ng-controller="asignacionController" ng-cloak>
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
             class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 id="myModalLabel" class="modal-title">Item </h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-offset-1">
                            <h4 class="text-muted">Nombre </h4>
                            @{{itemInfo.nombre}}
                            <h4 class="text-muted">Medida </h4>
                            @{{itemInfo.nombremedida}}
                            <h4 class="text-muted">SKU </h4>
                            @{{itemInfo.sku}}
                            <h4 class="text-muted">Categoria</h4>
                            @{{itemInfo.nombrecategoria}}
                            <h4 class="text-muted">Tipo</h4>
                            @{{itemInfo.nombrepapel}} | @{{itemInfo.gramaje}}
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
                <div class="content-wrapper" style="z-index:100">
                    <div class="content-heading">
                        Asignación de procesos
                    </div>
                </div>

                <div style="padding-left: 20px">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" ng-model="buscar" class="form-control" placeholder="Buscar item"/>
                        </div>
                    </div>
                        <hr>

                    <div class="row">
                        <div class="col-md-5">

                            <div class="panel ">
                                <div class="panel-heading bg-gray-lighter text-bold">Items</div>
                                <div>
                                    <ul class="list-group">
                                        <li ng-repeat="item in datos.items | filter : buscar" class="list-group-item procesos"
                                            ng-class="item.id_item==itemSeleccionado.id_item?'list-group-item-success':''">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <span>@{{ item.sku }} - @{{ item.nombre |  limitTo:20}}</span>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" class="pull-right" data-toggle="modal"
                                                       data-target="#myModal" ng-click="mostrarInfo(item)"><em
                                                                class="icon-eye "></em></a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" class="pull-right" ng-click="mostrarProcesos(item)"><em
                                                                class="icon-directions "></em></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 box-placeholder" ng-hide="!itemSeleccionado">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>@{{itemSeleccionado.nombre}}</h4>
                                </div>
                                <div class="col-md-6">

                                    <div class="col-md-6">
                                        <button class="btn btn-purple pull-right" ng-if="modificoItem==true"
                                                ng-click="guardarModificacion(itemSeleccionado)"><em
                                                    class="fa fa-save"></em></button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-default pull-right"
                                                ng-click="cancelarModificacion()"><em class="fa fa-close"></em></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div ng-repeat="(listName, list) in models.procesos" class="col-md-6">
                                    <div class="panel panel-default">
                                        <button class="btn btn-default btn-xs  pull-right"
                                                ng-show="listName=='Asignados' && list.length> 2"
                                                ng-click="quitarTodos()">Quitar
                                            todos
                                        </button>
                                        <div class="panel-heading">
                                            <h3 ng-show="listName=='Asignados'" class="panel-title">Procesos
                                                Asignados</h3>
                                            <h3 ng-show="listName=='Lista'" class="panel-title"> Catálogo de
                                                Procesos</h3>
                                        </div>

                                        <ul dnd-list="list" class="list-group" style="min-height: 300px">

                                            <li ng-repeat="item in list"
                                                dnd-draggable="item"
                                                dnd-moved="list.splice($index, 1)"
                                                dnd-effect-allowed="move"
                                                dnd-selected="models.selected = item"
                                                ng-class="{'selected': models.selected === item}"
                                                class="list-group-item"
                                            >
                                                <em class="icon-settings"></em>
                                                <div ng-if="listName=='Asignados'"
                                                     class="pull-right label label-warning">
                                                    @{{ $index+1 }}
                                                </div>
                                                @{{item.nombre}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </section>

            <!-- Page footer-->
            <footer>
                @include("partials.footer")
            </footer>


        </div>
    </div>
    {{--<script src="{{ asset('logic/main.js') }}"></script>--}}
    <script src="{{ asset('logic/asignacion.js') }}"></script>
@endsection

