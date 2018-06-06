app.controller("OrdenController", function ($scope, apiPrintomatik, apiService) {

    $scope.orden = [];
    $scope.productos = [];
    $scope.proceso_activo=[];



    // $scope.models = {
    //     procesos: {
    //         "Asignados": [],
    //         "Lista": [{id_proceso: 3, descripcion: "Proceso1", orden: 0}, {
    //             id_proceso: 8,
    //             descripcion: "Proceso8",
    //             orden: 2
    //         }]
    //     }
    // };
    //
    //
    // for (i = 0; i <= 5; i++) {
    //     $scope.models.procesos.Asignados.push({id_proceso: i, descripcion: 'Proceso ' + i, orden: i,es_activo:0});
    // }
    // for (i = 20; i <= 30; i++) {
    //     $scope.models.procesos.Lista.push({id_proceso: i, descripcion: 'Proceso ' + i, orden: i});
    // }





    apiService.getOrdenes().then(function (result) {
        $scope.ordenes = result.data;
        console.log($scope.ordenes);
    });
    $scope.productosPorOrden = function (numeroOrden) {

        apiService.getProductosPorOrden(numeroOrden).then(function (result) {
            $scope.productos = result.data;
        });
    };
    $scope.infoCliente = function (orden) {
        $scope.orden = orden;
    }


});

