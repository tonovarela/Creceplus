@extends("layout.dashboard")
@section('titulo', 'Productos')
@section('content')
    <div ng-app="App" ng-controller="ProductoController" ng-cloak>

        <div class="wrapper">
        @include('partials.header')
        @include('partials.aside')
        @include('partials.offside')
        <!-- Main section-->
            <section id="contenedor">
                <!-- Page content-->
                @component('partials.titlemodule')
                    Procesos por producto
                @endcomponent
                <div style="padding-left: 40px">
                    <div class="row">
                        <div class="col-md-4">
                            <p><label class=" text-muted
                        ">SKU : </label> {{$producto->sku}}</p>
                            <p><label class="text-muted">Nombre : </label> {{$producto->nombre}}</p>


                            @if($terminoProduccion==1)
                                <div class="alert alert-info">
                                    Este producto ha terminado su proceso de Producción
                                </div>
                            @endif

                            <div class="form-group" {{$terminoProduccion==1?'hidden':''}}>
                                <form method="POST" action="{{URL('dashboard/productos/procesos/store')}}">
                                    <input type="hidden" name="orden_numero" value="{{$orden_numero}}"/>
                                @foreach($procesos as $proceso)
                                    <div>
                                        <input type="hidden" name="sku" value="{{$producto->sku}}"/>
                                        <label class="radio-inline c-radio">
                                            <input name="id_proceso" value="{{$proceso->id_proceso}}"
                                                   {{$proceso->actual==1?'checked=""':''}}
                                                   type="radio">
                                            <span class="fa fa-gear"></span>{{$proceso->nombre}}
                                        </label>
                                    </div>
                                @endforeach
                                <hr>
                                    {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{URL::to("/dashboard/orden/$orden_numero/detalle")}}" class="btn btn-default"><em class="fa fa-close"></em>Cancelar</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit"   class="btn btn-purple" ><em class="fa fa-save"></em>Guardar</button>
                                    </div>
                                </div>
                                </form>

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

