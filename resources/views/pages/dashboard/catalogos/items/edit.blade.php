@extends("layout.dashboard")
@section('titulo', 'Items')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    {{--<script src="{{ asset('lib/angular.js') }}"></script>--}}

    <!-- Main section-->
        <section  ng-controller="itemEditController" >
            <!-- Page content-->
            <div class="content-wrapper"   ng-cloak >
                <h3> Items
                </h3>
                <div class="row"  >
                    <div class="col-md-6">
                        <form class="form-horizontal" novalidate name="itemForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input-id-1" class="col-sm-2 control-label">Categoria</label>
                                        <div class="col-sm-10">
                                            <input ng-model="modelo.id_item"
                                                   ng-init="modelo.item.id_item={{$modelo->id_item}}" type="hidden"/>
                                            <select name="categoria" class="form-control"
                                                    ng-model="modelo.item.id_categoria">
                                                <option ng-repeat="categoria in catalogos.categorias"
                                                        ng-selected="categoria.id_catetoria=modelo.item.id_categoria"
                                                        value="@{{categoria.id_categoria}}">
                                                    @{{ categoria.nombre }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-id-1" class="col-sm-2 control-label">Medidas</label>
                                        <div class="col-sm-10">

                                            <select class="form-control" ng-model='modelo.item.id_medida'>
                                                <option ng-repeat="medida in catalogos.medidas"
                                                        ng-selected="medida.id_medida==modelo.item.id_medida"
                                                        value="@{{medida.id_medida}}">@{{medida.descripcion}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tipo de papel</label>
                                        <div class="col-sm-10">
                                            <select ng-model="modelo.item.id_tipopapel" class="form-control">
                                                <option ng-repeat="tipo in catalogos.tipos"
                                                        ng-selected="tipo.id_tipopapel==modelo.item.id_tipopapel"
                                                        value="@{{tipo.id_tipopapel}}">@{{tipo.nombre}}
                                                </option>
                                            </select>


                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="input-id-1" class="col-sm-4 control-label">Tinta</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Frente"
                                                   ng-model="modelo.item.frente" required
                                                   maxlength="1" restrict-input="^[0-9-]*$"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Vuelta"
                                                   ng-model="modelo.item.vuelta" required
                                                   maxlength="1" restrict-input="^[0-9-]*$"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="control-label">Nombre</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="nombre" maxlength="50"
                                                   ng-model="modelo.item.nombre"
                                                   required
                                            />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="control-label">Descripción</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="form-control" required ng-model="modelo.item.descripcion"
                                                      style="resize:initial;min-height:110px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-8">
                                            <label class="col-sm-4 control-label">Activo</label>
                                            <div class="col-sm-4">
                                                <label class="switch">
                                                    <input name="Activo" ng-model="modelo.item.activo"
                                                           ng-checked="modelo.item.activo=='1'"
                                                           ng-true-value="'1'" ng-false-value="'0'"
                                                           type="checkbox">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-8">
                                            <div class="col-md-6">
                                                <a class="btn btn-default"
                                                   href="{{URL::to('dashboard/catalogos/items')}}">
                                                    <em class="fa fa-close"></em>
                                                    Cancelar
                                                </a>

                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-purple"
                                                        ng-click="actualizar()"
                                                        ng-disabled="itemForm.$invalid || errors.length>0">
                                                    <em class="fa fa-save"></em>
                                                    Guardar
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </form>


                    </div>
                    <div class="col-md-6">
                        <div class="row">

                            <div class="bs-callout bs-callout-success" style="margin-top: -5px;">
                                <h4>SKU</h4>
                                <span class="box-placeholder">
                            <label class="text-danger text-md">@{{ n.categoria }}</label>
                             </span>
                                <span class="box-placeholder">
                            <label class="text-green text-md">@{{ n.medida }}</label>
                             </span>
                                <span class="box-placeholder">
                            <label class="text-success text-md">@{{ n.tipo }}</label>
                            </span>
                                <span class="box-placeholder">
                            <label class="text-warning text-md">@{{ n.frente}} @{{ n.vuelta }}</label>
                            </span>
                            </div>

                            {{--<ul>--}}
                            {{----}}
                            {{--@foreach($catalogo  as $categoria)--}}
                            {{--<li>{{json_encode($categoria)}}</li>--}}
                            {{--@endforeach--}}
                            {{--</ul>--}}
                        </div>
                        {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                        {{--<div class="panel panel-primary">--}}
                        {{--<div class="panel-heading">--}}
                        {{--Procesos Asociados--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                        {{--1--}}
                        {{--</div>--}}

                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                        {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">--}}
                        {{--Catalogo de Procesos--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                        {{--2--}}
                        {{--</div>--}}

                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                    </div>


                </div>

            </div>
        </section>
        {{--<script src="{{ asset('logic/main.js') }}"></script>--}}
        <script src="{{ asset('logic/items.js') }}"></script>
        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>
    </div>

@endsection
