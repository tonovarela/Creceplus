@extends("layout.dashboard")
@section('titulo', 'Procesos')
@section('content')
    <div class="wrapper">
    @include('partials.header')
    @include('partials.aside')
    @include('partials.offside')
    <!-- Main section-->
        <section>
            <!-- Page content-->
            <div class="content-wrapper">
                <div class="content-heading">
                    Procesos
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <form action="{{URL::to('dashboard/procesos/add')}}" method="POST" data-parsley-validate="">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="descripcion" id="nombre"
                                       placeholder="Nombre">
                                <ul>
                                    @foreach ($errors->get('descripcion') as $message)
                                        <li class="parsley-required">{{$message}}</li>
                                    @endforeach
                                </ul>
                                {{ csrf_field() }}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </form>

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
