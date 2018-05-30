@extends("layout.dashboard")
@section('titulo', 'Usuarios')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')

    @include('partials.offside')
    <!-- Main section-->
        <section>
            <!-- Page content-->
            @component('partials.titlemodule')
                Usuarios
            @endcomponent
            <div style="padding-left: 20px"  ng-controller="UsuarioController" ng-cloak >
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Buscar" ng-model="buscar"/>

                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-purple" href="{{URL::to('dashboard/catalogos/usuarios/add')}}"><em
                                    class="icon-plus"></em>Agregar </a>
                    </div>
                    <div class="col-md-2">
                        <span class="pull-center">
                        <button class="btn  btn-defatult" data-ng-if="lista" data-ng-click="toogleLista()"><em
                                    class="icon-list"></em></button>
                        <button class="btn  btn-default" data-ng-if="!lista" data-ng-click="toogleLista()"><em
                                    class="icon-grid"></em></button>
                            </span>
                    </div>

                </div>

                <div class="row">
                    <hr>

                    <div class="col-md-3" data-ng-repeat="usuario in usuarios | filter:buscar " ng-show="lista">
                        <div class="panel panel-default" style="min-height: 170px;">
                            <div class="panel-heading">
                                <b><em class="fa fa-user" style="margin-right: 5px"></em>@{{ usuario.Login }}</b>
                                <p ng-if="usuario.EstatusCRECE==0" class="pull-right text-danger"><em
                                            class="fa fa-circle "> </em></p>
                                <p ng-if="usuario.EstatusCRECE==1" class="pull-right text-success"><em
                                            class="fa fa-circle"> </em></p>
                            </div>
                            <div class="panel-body">

                                <p>
                                    <small>@{{ usuario.Nombre }}</small>
                                </p>
                                <h6> @{{ usuario.Departamento }}</h6>
                                <p><em class="fa fa-envelope" style="margin-right: 5px"></em>
                                    <small>@{{ usuario.Correo }}</small>
                                </p>
                                <p class="pull-right"><a href="usuarios/edit/@{{usuario.Id_Usuario}}"
                                                         class="btn btn-info btn-outline btn-xs"><em
                                                class="fa fa-edit"></em></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9" ng-show="!lista">

                        <table class="table table-responsive">
                            <tr>
                                <th>Activo</th>
                                <th>Login</th>
                                <th>Nombre</th>
                                <th>correo</th>
                                <th>Departamento</th>
                            </tr>
                            <tr data-ng-repeat="usuario in usuarios | filter:buscar ">
                                <td><em class="fa fa-circle"
                                        ng-class="usuario.EstatusCRECE==1?'text-success':'text-danger'"></em></td>
                                <td>@{{usuario.Login}}</td>
                                <td>@{{usuario.Nombre}}</td>
                                <td>@{{usuario.Correo}}</td>
                                <td>@{{usuario.Departamento}}</td>
                                <td><a href="usuarios/edit/@{{usuario.Id_Usuario}}"
                                       class="btn btn-info btn-outline btn-xs"><em
                                                class="fa fa-edit"></em></a></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>


        </section>

        <script src="{{asset('logic/usuarios.js')}}"></script>

        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>

    </div>
@endsection

