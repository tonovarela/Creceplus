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
            <div style="padding-left: 30px">
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal" method="POST"
                              action="{{URL('dashboard/catalogos/usuarios/store')}}">
                            <div class="form-group">
                                <input type="text" name="nombre" value="{{ Request::old('nombre') ?: '' }}" placeholder="Nombre" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="email" name="correo" value="{{ Request::old('correo') ?: '' }}" placeholder="Correo" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="login" value="{{ Request::old('login') ?: '' }}" placeholder="Login" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" value="{{ Request::old('password') ?: '' }}" placeholder="Password" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="departamento" value="{{ Request::old('departamento') ?: '' }}" placeholder="Departamento" class="form-control"/>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-offset-10">
                                    <label class="control-label">Activo</label>
                                    <div>
                                        <label class="switch">
                                            <input name="activo" checked="" type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Rol</label>
                                <select class="form-control" name="rol">
                                    @foreach($modelo as $rol)
                                        <option value="{{$rol->id_tipousuario}}">{{$rol->descripcion}}</option>
                                    @endforeach
                                </select>
                                {{csrf_field()}}
                            </div>
                            <div class="col-md-offset-6">
                                <br>
                                <br>
                                <span class="pull-right">
                                <a href="{{URL::to('dashboard/catalogos/usuarios')}}" class="btn btn-default"><em
                                            class="fa fa-close"></em>Cancelar</a>
                                <button class="btn btn-info"><em class="fa fa-save"></em>Aceptar</button>
                                    </span>
                            </div>


                        </form>
                    </div>
                    <div class="col-md-4">
                        @include('partials.form.error')
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

