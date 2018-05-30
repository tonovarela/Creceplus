@extends("layout.dashboard")
@section('titulo', 'Recomposición de procesos')

@section('content')
    <div class="App" ng-app="App" ng-controller="recomposicionController" ng-cloak>
        <div class="wrapper">
        @include('partials.header')
        @include('partials.aside')
        @include('partials.offside')


        <!-- Main section-->
            <section>
                <!-- Page content-->
                <div class="content-wrapper" style="z-index:100">
                    <div class="content-heading">
                        <a href="{{URL::to("dashboard")}}">
                            <em class="fa  fa-arrow-left"></em>
                        </a>Recomposición de ruta de procesos
                    </div>
                </div>

                <div style="padding-left: 20px">

                    <div class="row">
                        <div class="col-md-5">

                            <div class="panel ">
                                <input type="hidden" ng-init="id_producto={{$producto->id_producto}}"/>
                                <div class="panel-heading bg-gray-lighter text-bold">Producto</div>
                                <div class="panel-body">
                                    <h4>{{$producto->nombre}}</h4>
                                    <ul>
                                        <li>
                                            {{$producto->sku}}
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 box-placeholder" >
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>@{{itemSeleccionado.nombre}}</h4>
                                </div>
                                <div class="col-md-6">

                                    <div class="col-md-6">
                                        <button class="btn btn-purple btn-xs pull-right" ng-if="modificoProducto==true"
                                                ng-click="guardarModificacion()"><em
                                                    class="fa fa-save"></em></button>

                                    </div>

                                    <div class="col-md-6">
                                        <a class="btn btn-default btn-xs pull-right"
                                           href="{{URL::to('dashboard')}}"     ><em class="fa fa-close"></em></a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div ng-repeat="(listName, list) in models.procesos " class="col-md-6">

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
    <script src="{{ asset('logic/recomposicion.js') }}"></script>
@endsection

