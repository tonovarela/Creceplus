app.controller("ProductoProcesoController", function ($scope, apiPrintomatik, apiService, $timeout) {
    $('[data-ui-slider]').slider();

    $scope.serverPath=apiService.getServerPath();
    $scope.producto = [];
    $scope.datos = [];
    $scope.itemInfo = null;
    $scope.cargo = false;
    $scope.modificoItem = false;

    $scope.newmodel = {};
    //Va a contener los procesos asignados y la por asignar
    $scope.models = {
        procesos: {
            "Asignados": [],
            "Lista": []
        }
    };



    $scope.guardarModificacion = function () {
        swal({
            title: "Información",
            text: "Confirma realizar los cambios?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5d9cec",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function () {
            $scope.confirmarModificacion();
            swal("Listo!", "Los procesos del producto se han actualizado.", "success");
            setTimeout(function(){
                window.location.href = $scope.serverPath+'/dashboard/catalogos/productos';
                  $scope.modificoItem = false;
            },2000)


        });

    };

    $scope.confirmarModificacion = function () {
        $scope.newmodel = [];
        $scope.modelproduct={sku:$scope.sku};
        var contador = 1;
        angular.forEach($scope.models.procesos.Asignados, function (value) {
            $scope.newmodel.push({
                id_proceso: value.id_proceso,
                orden: contador++,
                sku: $scope.sku
            });

        });

        apiService.productoProcesosUpdate($scope.newmodel, $scope.modelproduct).then(function (result) {
            console.log(result.data);
        });
    };
    $scope.quitarTodos = function () {
        var asignados = $scope.models.procesos.Asignados;
        angular.forEach(asignados, function (data) {
            $scope.models.procesos.Lista.push(data);
        });
        $scope.models.procesos.Asignados.length = 0;
    };



    $scope.mostrarProcesos = function () {
        $scope.models.procesos.Lista.length = 0;
        $scope.models.procesos.Asignados.length = 0;
        $scope.cargo = false;
        $scope.modificoItem = false;

        apiPrintomatik.getProductbySKU($scope.sku).then(function (result) {
            $scope.producto = result.data;

            if($scope.sku==null){
                window.location=$scope.serverPath+"/dashboard/catalogos/productos";
            }

        });
        apiService.getProductoProcesosPorSKU($scope.sku).then(function (result) {

            angular.forEach(result.data, function (data) {
                if (data.orden === null) {
                    $scope.models.procesos.Lista.push(data);
                } else {
                    $scope.models.procesos.Asignados.push(data);
                }

            });
            // console.log("Asignados "+JSON.stringify($scope.models.procesos.Asignados));
            // console.log("Procesos "+JSON.stringify($scope.models.procesos.Lista));
            $timeout(function () {
                $scope.cargo = true;
            });
        });
    };


    $timeout(function () {
        $scope.mostrarProcesos();
    });





    $scope.$watch('models', function (newValue, oldValue) {
        if ($scope.cargo) {
            $scope.modificoItem = true;

        }
    }, true);


});

