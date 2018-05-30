<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon"/>
    <meta name="keywords" content="app, dots ">
    <title>@yield('titulo')</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.min.css')}}">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{asset( 'vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css') }} " id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{asset('css/app.css') }}" id="maincss">


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
</head>

<body ng-app="App" ng-controller="Ctrl">

@yield("content")


<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src=" {{ asset ('vendor/modernizr/modernizr.custom.js') }}"></script>
<!-- JQUERY-->
<script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>   <!-- BOOTSTRAP-->
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- STORAGE API-->
<!-- <script src="../vendor/jQuery-Storage-API/jquery.storageapi.js"></script> -->
<!-- PARSLEY-->
<!-- <script src="../vendor/parsleyjs/dist/parsley.min.js"></script> -->
<!-- =============== APP SCRIPTS ===============-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('logic/main.js') }}"></script>
</body>

</html>