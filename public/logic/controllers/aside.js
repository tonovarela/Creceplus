app.controller("AsideController", function ($scope, apiService, socket) {

    $scope.Produccion = {
        CTP: 0,
        Offset: 0,
        Laminado: 0,
        Barniz: 0,
        Corte: 0,
        Suajado: 0,
        Doblez: 0,
        Engrapado: 0,
        AcabadoManual: 0,
        ControlCalidad: 0
    };
    $scope.Procesos = [];
    $scope.cargarTotales = function () {
        apiService.getTotalProcesosActuales().then(function (result) {
            angular.forEach(result.data, function (x) {
                $scope.Procesos[x.id_proceso] = x.total;
            });
            $scope.Produccion = {
                CTP: $scope.Procesos[1],
                Offset: $scope.Procesos[2],
                Laminado: $scope.Procesos[4],
                Barniz: $scope.Procesos[5],
                Corte: $scope.Procesos[6],
                Suajado: $scope.Procesos[7],
                Doblez: $scope.Procesos[8],
                Engrapado: $scope.Procesos[9],
                AcabadoManual: $scope.Procesos[11],
                ControlCalidad: $scope.Procesos[12]
            };
            console.log("Totales Recargados");
        });
    };

    socket.on('Produccion', function (data) {
        $scope.cargarTotales();
    });
    $scope.cargarTotales();
});