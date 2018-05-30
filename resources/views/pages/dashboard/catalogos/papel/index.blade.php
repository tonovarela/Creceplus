@extends("layout.dashboard")
@section('titulo', 'Tipos de Papel')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    <!-- Main section-->
        <section>
            <!-- Page content-->
            @component('partials.titlemodule')
                Tipo de Papel
            @endcomponent
            <div style="padding-left: 20px">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                    <span class="pull-left">
                    <a href="{{ URL::to('dashboard/catalogos/papel/add')}}" class="btn btn-purple" >
                        <em class="icon-plus"></em>
                        Agregar
                    </a>
                        </span>
                    </div>

                </div>
                <div class="row" >
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- START table-responsive-->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Gramaje</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($modelo as $papel)
                                            <tr>
                                                <td class="col-md-1">
                                                    {{$papel->id_tipopapel}}
                                                </td>
                                                <td class="col-md-6">
                                                    {{$papel->nombre}}
                                                </td>
                                                <td class="col-md-2">
                                                    {{$papel->gramaje}}
                                                </td>
                                                <td class="col-md-2">
                                                    <a class="btn btn-info btn-outline btn-xs"
                                                       href="{{ URL::to('dashboard/catalogos/papel/edit/'.$papel->id_tipopapel) }}">
                                                        <em class="fa fa-edit"></em>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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

