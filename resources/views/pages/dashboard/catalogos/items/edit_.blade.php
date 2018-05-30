@extends("layout.dashboard")
@section('titulo', 'Items')
@section('content')
    <div class="wrapper">
        @include('partials.header')
        @include('partials.aside')
        @include('partials.offside')
        <script src="{{ asset('lib/angular.js') }}"></script>
        <script src="{{ asset('lib/angular-drag-and-drop-lists.min.js') }}"></script>
        <script src="{{ asset('logic/items.js') }}"></script>
        <link rel="stylesheet" href="{{asset('css/drop-list.css')}}">
        <!-- Main section-->
        <section>
            <!-- Page content-->
            <div class="content-wrapper" ng-app="app" ng-controller="itemController">
                <h3>Item</h3>


                <div class="row">



                </div>
                <div class="procesos row">

                <div class="col-md-12">
                <hr></hr>
                <div class="row">
                <div ng-repeat="(listName, list) in models.procesos" class="col-md-6">
                <div class="panel panel-default">
                <button class="btn btn-default  pull-right" ng-show="listName=='Asignados' && list.length> 2" ng-click="quitarTodos()">Quitar todos</button>
                <div class="panel-heading">
                <h3 ng-show="listName=='Asignados'" class="panel-title">Procesos Asignados</h3>
                <h3 ng-show="listName=='Lista'" class="panel-title"> Catálogo de Procesos</h3>
                </div>

                <ul dnd-list="list">

                <li ng-repeat="item in list"
                dnd-draggable="item"
                dnd-moved="list.splice($index, 1)"
                dnd-effect-allowed="move"
                dnd-selected="models.selected = item"
                ng-class="{'selected': models.selected === item}"
                >
                <div ng-if="listName=='Asignados'" class="pull-right label label-warning">@{{$index+1}}</div>
                @{{item.label}}
                </li>
                </ul>
                </div>
                </div>
                </div>



                </div>

                <!-- <div class="col-md-4">
                <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Generated Model</h3>
                </div>
                <div class="panel-body">
                <pre class="code">@{{modelAsJson}}</pre>
                </div>
                </div>
                </div> -->

                </div>

            </div>
        </section>
        <!-- Page footer-->
        <footer>
            @include("partials.footer")
        </footer>
    </div>
@endsection
