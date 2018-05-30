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
                        <ul class="list-group">
                            @foreach($modelo as $proceso)
                                <li class="list-group-item">{{$proceso->id_proceso}}    -{{$proceso->descripcion}}</li>
                            @endforeach

                        </ul>
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
