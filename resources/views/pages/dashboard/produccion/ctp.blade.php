@extends("layout.dashboard")
@section('titulo', 'Ordenes de producción')
@section('content')


        <div class="wrapper" >
                @include('partials.header')
                @include('partials.aside')
                @include('partials.offside')
        <!-- Main section-->
            <section ng-controller="CTPController" ng-cloak>
                @component('partials.titlemodule')

                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group ">
                                <p class="pull-left text-muted title_produccion">CTP

                                </p>


                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <input placeholder="Ingrese el código" class="form-control input-lg" ng-model="entrada"
                                       type="text">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default input-lg" id="code"
                                            ng-click="enviando()">
                                        <em class="fa fa-qrcode fa-2x"></em><em class="fa fa-barcode fa-2x"></em>
                                    </button>
                                 </span>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div ng-if="estaciones.length!=0">

                                <select class="form-control input-lg" >
                                    <option ng-repeat="estacion in estaciones"  value="@{{estacion.id_estacion}}">@{{estacion.nombre}}</option>

                                </select>
                            </div>
                        </div>


                    </div>




                @endcomponent
            <!-- Page content-->


                <div class="container ">

                    {{--<div class="row">--}}
                        {{--<div class="col-lg-offset-10 col-md-offset-10 col-xs-offset-10">--}}
                            {{--<button class="btn btn-md btn-default"><em class="fa fa-refresh"></em></button>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    <div class="row">
                        <div class="col-md-11">
                            <div id="inner-content-div">
                                <div class="list-group list-group-produccion" ng-repeat="producto in productos">
                                    <div class="list-group-item">
                                        <table class="wd-wide">
                                            <tbody>
                                            <tr>
                                                <td class="wd-xs">
                                                    <div class="ph">
                                                        <em class="fa fa-file-image-o fa-2x text-purple"></em>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="ph">
                                                        <h4 class="media-box-heading">@{{producto.nombreproducto}}</h4>
                                                        <small class="text-muted">@{{ producto.id_producto }}</small>
                                                    </div>
                                                </td>
                                                <td class="wd-sm hidden-xs hidden-sm">
                                                    <div class="ph">
                                                        <p class="m0">Orden</p>
                                                        <small class="text-muted">@{{ producto.orden_numero }}</small>
                                                    </div>
                                                </td>
                                                <td class="wd-sm hidden-xs hidden-sm">
                                                    <div class="ph">
                                                        <p class="m0">Pliego</p>
                                                        <small class="text-muted">@{{ producto.pliego }}</small>
                                                    </div>
                                                </td>
                                                <td class="wd-sm hidden-xs hidden-sm">
                                                    <div class="ph">
                                                        <p class="m0">Subpliego</p>
                                                        <small class="text-muted">@{{ producto.subpliego }}</small>
                                                    </div>
                                                </td>

                                                <td class="wd-xs hidden-xs hidden-sm">
                                                    <div class="ph">
                                                        <p class="m0 text-muted">
                                                            <em class="icon-doc mr fa-lg"></em>@{{ producto.cantidadordenada }} </p>
                                                    </div>
                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END dashboard main content-->
                                </div ng-re>



                            </div>


                        </div>

                    </div>
                </div>
            </section>
                {{--<div class="loading" ng-show="cargando" >--}}
                {{--<em class="fa  fa-refresh fa-spin fa-5x text-purple" ></em>--}}
                {{--</div>--}}




            <script src="{{ asset('logic/ctp.js')}}"></script>


            <!-- Page footer-->
            <footer>
                @include("partials.footer")
            </footer>

        </div>




@endsection

