@extends("layout.acceso")
@section('titulo', 'Login')
@section('content')
    <div class="wrapper">
        <div class="block-center mt-xl wd-xl">
        @include('partials.alert.error')
        <!-- START panel-->
            <div class="panel panel-dark ">
                <div class="panel-heading text-center">
                    <a href="#">
                        <img src="{{ asset('img/Lito2.png') }}" alt="Image" class="block-center img-rounded">
                    </a>
                </div>
                <div class="panel-body">
                    <p class="text-center pv"></p>

                    <form role="form" id="form" method="POST" action="{{URL::to('acceso/login')}}"
                          data-parsley-validate="" novalidate="" class="mb-lg">
                        <div class="form-group has-feedback ">
                            <input value="{{ Request::old('usuario') ?: '' }}" name="usuario"
                                   placeholder="Ingrese el usuario" autocomplete="off" required
                                   class="form-control {{ $errors->has('usuario') ? 'parsley-error':'' }}"
                                   ng-model="login.usuario">
                            <span class="fa fa-user form-control-feedback text-muted"></span>
                            <ul class="parsley-errors-list filled">
                                @foreach ($errors->get('usuario') as $message)
                                    <li class="parsley-required">{{$message}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="exampleInputPassword1" type="password" name="password" placeholder="Password"
                                   required class="form-control {{ $errors->has('password') ? 'parsley-error':'' }}"
                                   ng-model="login.password">
                            <span class="fa fa-lock form-control-feedback text-muted"></span>
                            @if ($errors->has('password'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">Escribe el password</li>
                                </ul>
                            @endif
                        </div>

                        <div class="clearfix">
                            {{ csrf_field() }}
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mt-lg">Login</button>
                        <!-- <button type="button" ng-click="envio()" class="btn btn-block btn-info mt-lg">AJAX</button>                     -->
                    </form>
                </div>
            </div>
            <!-- END panel-->
            <div class="p-lg text-center">
                @include('partials.footer')
                <br>

            </div>
        </div>
    </div>
@endsection
