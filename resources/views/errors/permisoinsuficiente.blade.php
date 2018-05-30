@extends('layout.acceso')
@section("content")
    <div class="wrapper">
        <div class="abs-center">
            <div class="text-center mv-lg">
                <h1 class="mb-lg"><em class="fa fa-cog fa-2x text-muted fa-spin text-info"></em>
                    <em class="icon-lock fa-5x text-muted text-info"></em>
                    <em class="fa fa-cog fa-2x text-muted fa-spin text-info"></em>
                </h1>
                <div class="text-bold text-md mb-md">No cuenta con los permisos suficientes para ver este recurso</div>
                <p class="lead m0"><sub>Permiso requerido {{$permiso_requerido}}</sub></p>
            </div>
        </div>

        <div class="abs-center wd-xl">
            <div class="text-center mb-xl">
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        <center><img src="{{URL::to('img/Lito2.png')}}" class="img img-responsive"/></center>
                    </div>
                </div>
            </div>
            <ul class="list-inline text-center text-sm mb-xl">
                <li><a href="{{URL::to('acceso/login')}}" class="text-muted">Inicio</a>
                </li>
            </ul>
            <div class="p-lg text-center">
                @include('partials/footer')
            </div>

        </div>
    </div>
@endsection
