<!-- sidebar-->
<aside class="aside" ng-controller="AsideController">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav data-sidebar-anyclick-close="" class="sidebar">
            <!-- START sidebar nav-->
            <ul class="nav">
                <!-- START user info-->
                <li class="has-user-block">
                    <div id="user-block" class="collapse">
                        <div class="item user-block">
                            <!-- User picture-->
                            <div class="user-block-picture">
                                <div class="user-block-status">
                                    <img src="{{asset('img/user.png')}}" alt="Avatar" width="60" height="60"
                                         class="img-thumbnail img-circle">
                                    <div class="circle circle-success circle-lg"></div>
                                </div>
                            </div>
                            <!-- Name and Job-->
                            <div class="user-block-info">
                                <span class="user-block-name">Hola, {{Session::get('entorno')->nombre}}  </span>
                                <span class="user-block-role"><b> {{Session::get('entorno')->rol}}</b></span>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- END user info-->
                <!-- Iterates over all sidebar items-->
                <li class="nav-heading ">
                    <span>Navegación principal</span>
                </li>
                @if ( Session::get('entorno')->mnu_catalogos=='1')
                    <li class=" ">

                        <a href="#catalogos" title="Catalogos" data-toggle="collapse">
                            <em class="fa fa-file-text"></em>
                            <span>Catálogos</span>
                        </a>

                        <ul id="catalogos" class="nav sidebar-subnav collapse">
                            @if ( Session::get('entorno')->mnu_catalogos_usuarios=='1')
                                <li class="{{Request::path()=='dashboard/catalogos/usuarios'?'active':''}}">
                                    <a href="{{URL::to('dashboard/catalogos/usuarios')}}" title="Usuarios">
                                        <span>-Usuarios</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_catalogos_procesos=='1')
                                <li class="{{Request::path()=='dashboard/catalogos/procesos'?'active':''}}">
                                    <a href="{{URL::to('dashboard/catalogos/procesos')}}" title="Procesos">
                                        <span>-Procesos</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_catalogos_maquinas=='1')
                                <li class="{{Request::path()=='dashboard/catalogos/estaciones'?'active':''}}">
                                    <a href="{{URL::to('dashboard/catalogos/estaciones')}}" title="Estaciones">
                                        <span>-Estaciones</span>
                                    </a>
                                </li>
                            @endif
                            {{--@if ( Session::get('entorno')->mnu_catalogos_items=='1')--}}
                                {{--<li class="{{Request::path()=='dashboard/catalogos/items'?'active':''}}">--}}
                                    {{--<a href="{{URL::to('dashboard/catalogos/items')}}" title="Items">--}}
                                        {{--<span>-Items</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                                <li class="{{Request::path()=='dashboard/catalogos/productos'?'active':''}}">
                                    <a href="{{URL::to('dashboard/catalogos/productos')}}" title="Producto">
                                        <span>-Productos</span>
                                    </a>
                                </li>
                        </ul>
                    </li>
                @endif




                @if ( Session::get('entorno')->mnu_ordenes=='1')
                    <li class="{{Request::path()=='dashboard'?'active':''}} ">
                        <a href="{{URL::to('dashboard')}}" title="Ordenes">
                            <em class="icon-grid"></em>
                            <span>Ordenes</span>
                        </a>
                    </li>
                @endif


                @if ( Session::get('entorno')->mnu_produccion=='1')
                    <li class=" ">
                        <a href="#produccion" title="Produccion" data-toggle="collapse">
                            <em class="icon-layers"></em>
                            <span>Producción</span>
                        </a>

                        <ul id="produccion" class="nav sidebar-subnav collapse">
                            {{--@if ( Session::get('entorno')->mnu_produccion_planeacion=='1')--}}
                            {{--<li>--}}
                            {{--<a href="#" title="Planeación">--}}
                            {{--<div class="pull-right label label-success">30</div>--}}
                            {{--<span> -Planeación</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--@endif--}}
                            @if ( Session::get('entorno')->mnu_produccion_ctp=='1')
                                <li class="{{Request::path()=='dashboard/produccion/ctp'?'active':''}} ">
                                    <a href="{{URL::to('dashboard/produccion/ctp')}}" title="CTP">
                                        <div class="pull-right label label-success">@{{Produccion.CTP}}</div>
                                        <span> -CTP</span>
                                    </a>
                                </li>
                            @endif

                            {{--<li>--}}
                            {{--<a href="#" title="ImpresionDigital">--}}
                            {{--<span>-Impresión Digital</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            @if ( Session::get('entorno')->mnu_produccion_offset=='1')
                                <li>
                                    <a href="#" title="Impresion">
                                        <div class="pull-right label label-success">@{{Produccion.Impresion}}</div>
                                        <span>-Impresión</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_laminado=='1')
                                <li>
                                    <a href="#" title="Laminado">
                                        <div class="pull-right label label-success">@{{Produccion.Laminado}}</div>
                                        <span>-Laminado</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_buv=='1')
                                <li>
                                    <a href="#" title="BarnizUV">
                                        <div class="pull-right label label-success">@{{Produccion.Barniz}}</div>
                                        <span>-Barniz UV plasta</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_corte=='1')
                                <li>
                                    <a href="#" title="Corte">
                                        <div class="pull-right label label-success">@{{Produccion.Corte}}</div>
                                        <span>-Corte</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_suajado=='1')
                                <li>
                                    <a href="#" title="Suajado">
                                        <div class="pull-right label label-success">@{{Produccion.Suajado}}</div>
                                        <span>-Suajado</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_doblez=='1')
                                <li>
                                    <a href="#" title="Doblez">
                                        <div class="pull-right label label-success">@{{Produccion.Doblez}}</div>
                                        <span>-Doblez</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_engrapado=='1')
                                <li>
                                    <a href="#" title="Engrapado">
                                        <div class="pull-right label label-success">@{{Produccion.Engrapado}}</div>
                                        <span>-Engrapado</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_acabadom=='1')
                                <li>
                                    <a href="#" title="Acabado">
                                        <div class="pull-right label label-success">@{{Produccion.AcabadoManual}}</div>
                                        <span>-Acabado Manual</span>
                                    </a>
                                </li>
                            @endif
                            @if ( Session::get('entorno')->mnu_produccion_calidad=='1')
                                <li>
                                    <a href="#" title="Control de Calidad">
                                        <div class="pull-right label label-success">@{{Produccion.ControlCalidad}}</div>
                                        <span>-Control de Calidad</span>
                                    </a>
                                </li>
                            @endif


                        </ul>

                    </li>
                @endif
                @if ( Session::get('entorno')->mnu_envios=='1')
                    <li>
                        <a href="#" title="Envio">

                            <em class="fa fa-truck"></em>
                            <span>Envio</span>
                        </a>
                    </li>
                @endif
                @if ( Session::get('entorno')->mnu_reportes=="1")
                    <li>
                        <a href="#" title="Reporte">

                            <em class="fa fa-bar-chart"></em>
                            <span>Reportes</span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- END sidebar nav-->
        </nav>
    </div>
    <!-- END Sidebar (left)-->
</aside>