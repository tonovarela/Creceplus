app.controller("AsideController", function ($scope, apiService, socket) {

    $scope.Produccion = {};
    $scope.Procesos = [];
    $scope.cargarTotales = function () {
        apiService.getTotalProcesosActuales().then(function (result) {
             var data = result.data;
            $scope.Produccion = {
                CTP:data.find(x=>x.descripcion==="CTP").total,
                Impresion: data.find(x=>x.descripcion==="Impresión").total,
                Laminado: data.find(x=>x.descripcion==="Laminado").total,
                Barniz: data.find(x=>x.descripcion==="Barniz UV").total,
                Corte: data.find(x=>x.descripcion==="Corte").total,
                Suajado: data.find(x=>x.descripcion==="Suajado").total,
                Doblez: data.find(x=>x.descripcion==="Doblez").total,
                Engrapado: data.find(x=>x.descripcion==="Engrapado").total,
                AcabadoManual: data.find(x=>x.descripcion==="Acabado Manual").total,
                ControlCalidad:data.find(x=>x.descripcion==="Control de Calidad").total
                };



        });
    };
    socket.on('Produccion', function (data) {
        $scope.cargarTotales();
    });

    $scope.cargarTotales();
});