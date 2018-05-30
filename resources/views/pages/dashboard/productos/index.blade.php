@extends("layout.dashboard")
@section('titulo', 'Productos')
@section('content')
    <div ng-app="App" ng-controller="ProductoController" ng-init="orden_numero='{{$orden_numero}}'" ng-cloak>

        <div class="wrapper">
        @include('partials.header')
        @include('partials.aside')
        @include('partials.offside')
        <!-- Main section-->
            <section>
                <!-- Page content-->
                @component('partials.titlemodule')
                    Productos
                @endcomponent
                <div style="padding-left: 20px">

                    <div class="row">
                        {{--<button ng-click="test()">test</button>--}}

                        <div class="col-md-3">
                            <ul class="list-group">
                        @foreach($productos as $producto)
                              <li  class="list-group-item"> {{$producto->nombre}}</li>
                        @endforeach
                            </ul>
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
            </section>
            {{--<script src="{{asset('logic/main.js')}}"></script>--}}
            <script src="{{asset('logic/productos.js')}}"></script>
            <!-- Page footer-->
            <footer>
                @include("partials.footer")
            </footer>

        </div>


    </div>

@endsection

