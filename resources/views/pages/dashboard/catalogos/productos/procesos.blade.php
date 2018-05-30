@extends("layout.dashboard")
@section('titulo', 'Productos ')
@section('content')
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
            <div style="padding:0px 15px 0px 15px" ng-controller="ProductoProcesoController" ng-cloak>
                <div class="row">
                    <hr>
                    <div class="col-md-offset-1 col-md-3">
                        <div class="panel ">
                            <input type="hidden" ng-init="sku='{{$modelo}}'"/>
                            <div class="panel-heading bg-gray-lighter text-bold"> @{{producto.sku}}</div>
                            <div class="panel-body">
                                <img class="img-thumbnail" ng-src="@{{producto.previewImg}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 box-placeholder" >
                        <div class="row">
                            <div class="col-md-6">
                                <h4>@{{itemSeleccionado.nombre}}</h4>
                            </div>
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <button class="btn btn-success btn-md pull-right" ng-if="modificoItem==true"
                                            ng-click="guardarModificacion()"><em
                                                class="fa fa-save"></em></button>

                                </div>

                                <div class="col-md-6">
                                    <a class="btn btn-danger btn-md pull-right"
                                       href="{{URL::to('dashboard/catalogos/productos')}}"     ><em class="fa fa-close"></em></a>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div ng-repeat="(listName, list) in models.procesos " class="col-md-6">

                                <div class="panel panel-default">
                                    <button class="btn btn-warning btn-xs  pull-right"
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


                                    <ul dnd-list="list" class="list-group" style="min-height: 300px"

                                    >

                                        <li ng-repeat="producto in list"
                                            dnd-draggable="producto"
                                            dnd-moved="list.splice($index, 1)"
                                            dnd-disable-if="producto.es_acabado == '1'"
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
                                             :: @{{ producto.descripcion}}
                                        </li>
                                        <li class="dndPlaceholder">
                                            Arrastra cualquier proceso que no sea un <strong>acabado</strong> aqui
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </section>
<style>
    ul[dnd-list] .dndPlaceholder {
        display: block;
        background-color: #ddd;
        padding: 10px 15px;
        min-height: 42px;
    }
</style>
        <script src="{{asset('logic/controllers/productoproceso.js')}}"></script>
        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>

    </div>
@endsection

