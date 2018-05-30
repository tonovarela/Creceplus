app.controller("ProductosController", function ($scope, apiPrintomatik,apiService, $q) {
    $('[data-ui-slider]').slider();

    $scope.productos = [];


    var _productos = apiPrintomatik.getProductsList().then(function (result) {
        return result.data;
    });
    var _totales = apiService.productoProcesosTotal().then(function (result) {
        return result.data;
    });


    $q.all([_productos,_totales]).then(function(result){
        var productos=result[0];
        var procesos_totales = result[1];

        productos.forEach(function(producto){
            var proceso_total= procesos_totales.find(x => x.sku === producto.sku);
            if (proceso_total!==undefined){
                producto.total=proceso_total.total;
            }else{
                producto.total=0;
            }

        });

      $scope.productos=productos;
        console.log($scope.productos);

    });



});

