@extends('layout.acceso')
@section("content")
<div class="wrapper">
      <div class="abs-center wd-xl">
         <div class="text-center mb-xl">
            <div class="text-lg mb-lg">404</div>
            <p class="lead m0">No se pudó encontrar  este recurso</p>
            <div class="panel panel-dark">
                <div class="panel-heading">
                <center ><img src="{{URL::to('img/Lito2.png')}}" class="img img-responsive"/></center>
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
