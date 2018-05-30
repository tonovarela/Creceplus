@extends("layout.dashboard")
@section('titulo', 'Productos')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')

    @include('partials.offside')
    <!-- Main section-->
        <section ng-controller="ProductosController" ng-cloak>

            <!-- Page content-->
            @component('partials.titlemodule')
                Productos
            @endcomponent
            <div style="padding:0px 15px 0px 15px">
                <div class="row">
                    <div class="col-md-offset-9 col-md-3">
                        <input type="text" class="form-control" placeholder="Buscar Producto"
                               ng-model="searchProducto"/>
                    </div>
                </div>


                <div class="row">


                    <hr>


                    <div class=" col-md-3  col-xs-6"
                         ng-repeat="producto in productos | filter:searchProducto ">
                        <div class="panel panel-info" style="min-height: 170px;">
                            <div class="panel-heading">

                               @{{ producto.id }}
                            </div>
                            <div class="panel-body">

                                <p>
                                    <small><b>SKU: @{{ producto.sku }}</b></small>
                                </p>
                                <div>
                                    <img class="img-thumbnail center-block image_producto"
                                         data-ng-src="@{{ producto.previewImg }}"/>

                                </div>
                                <hr>
                                <a class="btn btn-default pull-right" aria-expanded="true"
                                   href="producto/@{{ producto.sku }}">
                                    <em class="icon-settings"></em>

                                </a>
                                <div>
                                    <div class="label " ng-class="producto.total>0?'label-success':'label-warning'"
                                         style="font-size: 90%">
                                        @{{ producto.total }}
                                    </div>
                                    <small style="padding-left: 2px;">Procesos asignados</small>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <script src="{{asset('logic/controllers/productos.js')}}"></script>
        <style>

        </style>
        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>

    </div>
@endsection

