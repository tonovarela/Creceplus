app.controller("CTPController", function ($scope, apiService, socket, SocketDATA, $timeout, $q) {

    var id_proceso = 1;
    var promiseEstaciones = apiService.getEstacionesPorProceso(id_proceso);
    var promiseProductosPorProcesar = apiService.getProductosPorProcesar(id_proceso);

    $scope.entrada = '';
    $scope.estaciones = [];
    $scope.productos=[];

    //$scope.counter = 2;
    $scope.cargando = false;


    socket.on('connect', function (data) {
        socket.emit('join', 'Se conecto el cliente');

    });
    socket.on('disconnect', function () {
        console.log("El cliente esta desconectado");
    });

    socket.on('reconnect', function (e) {
        console.log("el cliente se reconectando ");
    });


    socket.on('Produccion', function (data) {
        $scope.listener = SocketDATA;
        $scope.listener.loadData(data);
        if ($scope.listener.isCTP()) {
            console.log("Eco para CTP");
        }
    });


    $scope.enviando = function () {


        ///Calback
        socket.emit('Produccion', {CTP: "1"});

    };

    $q.all([promiseEstaciones, promiseProductosPorProcesar]).then(function (result) {
        $scope.estaciones = result[0].data;
        $scope.productos = result[1].data;
        $('#inner-content-div').slimScroll({
            height: '350px'
        });

    });


    // var timer = function () {
    //     $scope.counter--;
    //     if ($scope.counter !== 0) {
    //         $timeout(timer, 1000);
    //     } else {
    //         // $scope.cargando=false;
    //         $scope.counter =2;
    //     }
    // };


});

