<!DOCTYPE html>
<html lang="en"  >
<head>
    <meta charset="utf-8">
    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon"/>


    <!-- SLIDER CTRL-->
    <link rel="stylesheet" href={{asset('vendor/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css')}} />


    <!-- =============== Angular ===============-->
    <script src="{{asset('lib/angular.js')}}"></script>
    <script src="{{ asset('lib/angular-drag-and-drop-lists.min.js') }}"></script>
    <script src="{{asset('lib/socket.io.js')}}"></script>
    <script src="{{asset('logic/main.js')}}"></script>
    <script src="{{asset('logic/services/api.js')}}"></script>
    <script src="{{asset('logic/controllers/aside.js')}}"></script>
    <script src="{{asset('logic/services/printomatik.js')}}"></script>
    <script src="{{asset('logic/directives/main.js')}}"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield("titulo")</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.min.css') }}">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="{{ asset('vendor/whirl/dist/whirl.css') }}">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="{{ asset('vendor/weather-icons/css/weather-icons.min.css') }}">
    <!-- SWEET ALERT-->
    <link rel="stylesheet" href="{{asset('vendor/sweetalert/dist/sweetalert.css')}}">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="maincss">

    <link rel="stylesheet" href="{{ asset('css/theme-e.css') }}" id="maincss">
    <script type="text/javascript">
        var base_path = "{{URL::asset("/")}}";
    </script>
</head>


<body class="show-scrollbar layout-fixed" ng-app="App"  >
@yield('content')

<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src=" {{ asset('vendor/modernizr/modernizr.custom.js') }}"></script>
<!-- MATCHMEDIA POLYFILL-->
<script src=" {{ asset('vendor/matchMedia/matchMedia.js') }}"></script>
<!-- JQUERY-->
<script src=" {{ asset('vendor/jquery/dist/jquery.js') }}"></script>
<!-- BOOTSTRAP-->
<script src=" {{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- STORAGE API-->
<script src="{{ asset('vendor/jQuery-Storage-API/jquery.storageapi.js') }}"></script>
<!-- JQUERY EASING-->
<script src=" {{ asset('vendor/jquery.easing/js/jquery.easing.js') }}"></script>
<!-- ANIMO-->
<script src=" {{ asset('vendor/animo.js/animo.js') }}"></script>
<!-- SLIMSCROLL-->
<script src="{{ asset('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
{{--<!-- SCREENFULL-->--}}
{{--<script src="{{ asset ('vendor/screenfull/dist/screenfull.js') }} "></script>--}}
<!-- LOCALIZE-->
<script src=" {{ asset ('vendor/jquery-localize-i18n/dist/jquery.localize.js') }} "></script>
<!-- RTL demo-->
<script src=" {{ asset ('js/demo/demo-rtl.js') }} "></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- SPARKLINE-->
<script src=" {{ asset ('vendor/sparkline/index.js') }}"></script>
<!-- FLOT CHART-->
<script src="{{ asset ('vendor/flot/jquery.flot.js') }}"></script>
<script src="{{ asset ('vendor/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset ('vendor/flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset ('vendor/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset ('vendor/flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset ('vendor/flot/jquery.flot.categories.js')}}"></script>
<script src="{{ asset ('vendor/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<!-- EASY PIE CHART-->
<script src="{{ asset('vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js')}}"></script>
<!-- MOMENT JS-->
<script src=" {{ asset('vendor/moment/min/moment-with-locales.min.js') }}"></script>
<!-- SKYCONS-->
<script src="{{ asset('vendor/skycons/skycons.js') }}"></script>
<!-- DEMO-->
<script src="{{ asset('js/demo/demo-flot.js') }}"></script>
<!-- VECTOR MAP-->
<script src=" {{ asset('vendor/ika.jvectormap/jquery-jvectormap-1.2.2.min.js')      }}"></script>
<script src=" {{ asset('vendor/ika.jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('vendor/ika.jvectormap/jquery-jvectormap-us-mill-en.js') }}"></script>
<script src="{{ asset('js/demo/demo-vector-map.js') }}"></script>
<!-- SWEET ALERT-->
<script src="{{ asset('vendor/sweetalert/dist/sweetalert.min.js') }} "></script>
<!-- SLIDER CTRL-->
<script src="{{ asset('vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>


<script src="{{ asset('js/app.js')}}"></script>




</body>
</html>