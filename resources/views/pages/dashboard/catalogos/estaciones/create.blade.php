@extends("layout.dashboard")
@section('titulo', 'Máquinas')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    <!-- Main section-->
        <section>
            <!-- Page content-->
            @component('partials.titlemodule')

             Estaciones
            @endcomponent
            <div style="padding-left:10px">
                <div class="col-md-6" >
                    <div class="panel panel-default" style="padding: 20px;">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <form name="maquina" class="form-horizontal" method="POST"
                                  action="{{URL('dashboard/catalogos/estaciones/store')}}" style="padding: 20px;">
                                <div class="form-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="hidden" name="id_estacion" value=""/>
                                    <input type="text" name="nombre" class="form-control" value="{{ Request::old('nombre') ?: '' }}"/>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">Activo</label>
                                    <div >
                                    <label class="switch">
                                        <input name="activo" checked type="checkbox">
                                        <span></span>
                                    </label>
                                    </div>
                                </div>
                                <p></p>
                                <div class="form-group pull-right">

                                    <button type="button"  class=" btn btn-default" onclick="location.href='{{ url('dashboard/catalogos/estaciones') }}' " >
                                        <em class="fa fa-close"></em>
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary ">
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

        </section>

        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>

    </div>
@endsection

