app.controller("ProductoController", function ($scope, apiService) {
    $('[data-ui-slider]').slider();
    $scope.orden_numero={};

    $scope.test = function(){
        alert($scope.orden_numero);
    }


    //apiService.getProductosPorOrden(numeroOrden)





});