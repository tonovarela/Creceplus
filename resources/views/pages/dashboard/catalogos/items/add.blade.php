@extends("layout.dashboard")
@section('titulo', 'Items')
@section('content')
    <div class="wrapper">
        @include('partials.header')
        @include('partials.aside')
        @include('partials.offside')

        {{--<script src="{{ asset('logic/main.js') }}"></script>--}}
        <script src="{{ asset('logic/items.js') }}"></script>
        <!-- Main section-->
        <section>
            <!-- Page content-->
            <div class="content-wrapper"  ng-controller="itemController" ng-cloak>
                <h3> Items
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal" novalidate name="itemForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input-id-1" class="col-sm-2 control-label">Categoria</label>
                                        <div class="col-sm-10">
                                            <select name="categoria" class="form-control" required
                                                    ng-model="modelo.id_categoria">
                                                <option ng-repeat="categoria in catalogo.Categorias"
                                                        value="@{{categoria.id_categoria}}">
                                                    @{{categoria.nombre}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-id-1" class="col-sm-2 control-label">Medidas</label>
                                        <div class="col-sm-10">
                                            <select name="medida" class="form-control" required
                                                    ng-model="modelo.id_medida">
                                                <option ng-repeat="medida in catalogo.Medidas"
                                                        value="@{{medida.id_medida}}">
                                                    @{{medida.descripcion}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tipo de papel</label>
                                        <div class="col-sm-10">
                                            <select name="tipo" class="form-control" required
                                                    ng-model="modelo.id_tipopapel">
                                                <option ng-repeat="tipo in catalogo.Tipos"
                                                        value="@{{tipo.id_tipopapel}}">
                                                    @{{tipo.nombre}} - @{{tipo.gramaje}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--<div class="col-md-offset-6">--}}
                                            {{--<ul class="parsley-errors-list filled">--}}
                                                {{--<li ng-repeat="error in errors">@{{ error.mensaje}}</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                    <div class="form-group">
                                        <label for="input-id-1" class="col-sm-4 control-label">Tinta</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="Frente"
                                                   ng-model="modelo.frente" required
                                                   maxlength="1" restrict-input="^[0-9-]*$"/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="Vuelta"
                                                   ng-model="modelo.vuelta" required
                                                   maxlength="1" restrict-input="^[0-9-]*$"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="control-label">Nombre</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="nombre" maxlength="50"
                                                   required
                                                   ng-model="modelo.nombre"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="control-label">Descripción</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="form-control" required
                                                      ng-model="modelo.descripcion"
                                                      style="resize: none;min-height:110px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-8">
                                            <label class="col-sm-4 control-label">Activo</label>
                                            <div class="col-sm-4">
                                                <label class="switch">
                                                    <input name="Activo" ng-model="modelo.activo"
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
                                                <a  class="btn btn-default" href="{{URL::to('dashboard/catalogos/items')}}" >
                                                    <em class="fa fa-close"></em>
                                                    Cancelar
                                                </a>

                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-info"
                                                        ng-click="save()"

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
        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>
    </div>

@endsection
