@extends("layout.dashboard")
@section('titulo', 'Papel')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    <!-- Main section-->
        <section>
            <!-- Page content-->
            @component('partials.titlemodule')
                Papel
            @endcomponent
            <div style="padding-left: 20px">
                <div class="col-md-6">
                    <div class="panel panel-default" style="padding: 20px;">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <form name="papel" class="form-horizontal" method="POST"
                                  action="{{URL('dashboard/catalogos/papel/edit')}}" style="padding: 20px;">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="hidden" name="id_tipopapel" value="{{$modelo->id_tipopapel}}"/>
                                    <input type="text" name="nombre" class="form-control" value="{{$modelo->nombre}}"/>
                                </div>
                                <div class="form-group">
                                    <label >Gramaje</label>
                                    <input type="text" name="gramaje" class="form-control" value="{{$modelo->gramaje}}"/>
                                </div>

                                <p></p>
                                <div class="form-group pull-right">

                                    <button type="button" class="mb-sm btn btn-default"
                                            onclick="location.href='{{ url('dashboard/catalogos/papel') }}' ">
                                        <em class="fa fa-close" ></em>
                                        Cancelar

                                    </button>
                                    <button type="submit" class="mb-sm btn btn-primary">
                                        <em class="fa fa-save" ></em>
                                        Guardar </button>
                                </div>
                                {{ csrf_field() }}

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @include('partials.form.error')

                </div>
            </div>

        </section>

        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>

    </div>
@endsection

