@extends("layout.dashboard")
@section('titulo', 'Items')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    <!-- Main section-->
        <section>
            <!-- Page content-->
            <div class="content-wrapper"  style="z-index:100">
                <div class="content-heading">
                  Items
                </div>
            </div>
            <div style="padding-left: 20px" ng-controller="itemListController" ng-cloak>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Buscar" ng-model="buscar"/>

                    </div>
                    {{--<div class="col-md-6">--}}
                        {{--<a class="btn btn-purple" href="{{URL::to('dashboard/catalogos/items/add')}}"><em--}}
                                    {{--class="icon-plus"></em>--}}
                            {{--Agregar </a>--}}
                    {{--</div>--}}
                </div>
                <div class="row">
                    <hr>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th></th>
                                            <th>Nombre</th>
                                            <th>SKU</th>
                                            {{--<th>Categoria</th>--}}
                                            {{--<th>Medida</th>--}}
                                            {{--<th>Tipo de Papel</th>--}}
                                            <th>Procesos Asociados</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr ng-repeat="item in modelo.items | filter:buscar">
                                            <td>
                                                <em class="fa fa-circle @{{ item.activo=='1'?'text-success':'text-danger' }}"></em>
                                            </td>
                                            <td>@{{ item.nombre }}</td>
                                            <td>@{{ item.sku }}</td>
                                            {{--<td>@{{ item.nombrecategoria }}</td>--}}
                                            {{--<td>@{{ item.nombremedida }}</td>--}}
                                            {{--<td>@{{ item.nombrepapel }}</td>--}}
                                            <td class="col-md-1"><div class="label" ng-class="item.numprocesos==0?'label-danger':'label-success'">@{{item.numprocesos }}</div></td>
                                            <td><a href="items/procesos/@{{ item.id_item}}" class="btn btn-inverse btn-outline btn-xs"><em
                                                            class="fa fa-gears"></em></a></td>
                                            {{--<td><a href="items/edit/@{{ item.id_item}}" class="btn btn-info btn-outline btn-xs"><em--}}
                                                            {{--class="fa fa-edit"></em></a></td>--}}
                                        </tr>
                                    </table>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        {{--<script src="{{asset('logic/main.js')}}"></script>--}}

        <script src="{{asset('logic/items.js')}}"></script>
        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>

    </div>
@endsection




{{--@extends("layout.dashboard")--}}
{{--@section('titulo', 'Inicio')--}}
{{--@section('content')--}}
{{--<div class="wrapper">--}}
{{--@include('partials.header')--}}
{{--@include('partials.aside')--}}
{{--@include('partials.offside')--}}
{{--<script src="{{ asset('logic/main.js') }}"></script>--}}
{{--<script src="{{ asset('logic/items.js') }}"></script>--}}
{{--<!-- Main section-->--}}
{{--<section ng-app="App" ng-controller="itemListController" ng-clock>--}}
{{--<!-- Page content-->--}}
{{--<div class="content-wrapper">--}}
{{--<div class="content-heading">--}}
{{--Items--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-md-10">--}}
{{--<div class="table-responsive">--}}
{{--<table class="table table-striped table-bordered table-hover">--}}
{{--<tr>--}}
{{--<th></th>--}}
{{--<th>Nombre</th>--}}
{{--<th>Descripción</th>--}}
{{--<th>SKU</th>--}}
{{--<th>Categoria</th>--}}
{{--<th>Medida</th>--}}
{{--<th>Tipo de Papel</th>--}}
{{--<th></th>--}}
{{--</tr>--}}
{{--<tr ng-repeat="item in modelo.items">--}}
{{--<td>--}}
{{--<em class="fa fa-circle @{{ item.activo=='1'?'text-success':'text-danger' }}"></em>--}}
{{--</td>--}}
{{--<td>@{{ item.nombre }}</td>--}}
{{--<td>@{{ item.descripcion }}</td>--}}
{{--<td>@{{ item.sku }}</td>--}}
{{--<td>@{{ item.nombrecategoria }}</td>--}}
{{--<td>@{{ item.nombremedida }}</td>--}}
{{--<td>@{{ item.nombrepapel }}</td>--}}
{{--<td><a href="items/edit/@{{ item.id_item}}" class="btn btn-default"><em--}}
{{--class="fa fa-edit"></em></a></td>--}}
{{--</tr>--}}
{{--</table>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
{{--<!-- Page footer-->--}}
{{--<footer>--}}
{{--@include("partials.footer")--}}
{{--</footer>--}}
{{--</div>--}}
{{--@endsection--}}
