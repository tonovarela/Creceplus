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
            <div style="padding-left: 20px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" style="padding: 20px;">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <form name="maquina" class="form-horizontal" method="POST"
                                      action="{{URL('dashboard/catalogos/usuarios/edit')}}" style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="Nombre">Nombre</label>
                                        <input type="hidden" name="Id_Usuario" value="{{$modelo->Id_Usuario}}"/>
                                        <input type="text" name="nombre" class="form-control"
                                               value="{{$modelo->Nombre}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input type="email" name="correo" class="form-control"
                                               value="{{$modelo->Correo}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input type="text" name="login" class="form-control"
                                               value="{{$modelo->Login}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="departamento">Departamento</label>
                                        <input type="text" name="departamento" class="form-control"
                                               value="{{$modelo->Departamento}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label class=" control-label">Activo  </label>
                                        <div>
                                            <label class="switch">
                                                <input class="form-control" name="estatuscrece"  {{$modelo->EstatusCRECE='1'?'checked':''}} type="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Rol</label>
                                        <select class="form-control"  name="tipousuariocrece">
                                            @if ($modelo->TipoUsuarioCRECE==0)
                                                <option checked value="0">Sin rol asignado</option>
                                                @endif
                                            @foreach($roles as $rol)
                                                    <option {{$modelo->TipoUsuarioCRECE==$rol->id_tipousuario?'checked':''}} value="{{$rol->id_tipousuario}}">{{$rol->descripcion}}</option>


                                            @endforeach
                                        </select>

                                    </div>
                                    <p></p>
                                    <div class="form-group pull-right">

                                        <button type="button" class="mb-sm btn btn-default"
                                                onclick="location.href='{{ url('dashboard/catalogos/usuarios') }}' ">
                                            <em class="fa fa-close"></em>
                                            Cancelar

                                        </button>
                                        <button type="submit" class="mb-sm btn btn-primary">
                                            <em class="fa fa-save"></em>
                                            Guardar
                                        </button>
                                    </div>
                                    {{ csrf_field() }}

                                </form>
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
@endsection

