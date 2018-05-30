app.controller("OrdenController", function ($scope, apiPrintomatik, apiService) {

    $scope.orden = [];
    $scope.productos = [];
    $scope.lista=true;

    apiService.getOrdenes().then(function (result) {
        $scope.ordenes = result.data;
        console.log($scope.ordenes);
    });

    $scope.toogleLista=function(){
        $scope.lista=!$scope.lista;
    };


    $scope.productosPorOrden = function (numeroOrden) {

        apiService.getProductosPorOrden(numeroOrden).then(function (result) {
            $scope.productos = result.data;
        });
    };

    $scope.infoCliente = function (orden) {
        $scope.orden = orden;
    }
});

