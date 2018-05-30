app.controller("recomposicionController", function ($scope, apiService, $timeout) {

    $scope.datos = [];
    $scope.itemInfo = null;
    $scope.cargo = false;
    $scope.modificoProducto = false;
    $scope.id_prodcuto={};

    $scope.newmodel = {};
    //Va a contener los procesos asignados y la por asignar
    $scope.models = {
        procesos: {
            "Asignados": [],
            "Lista": []
        }
    };


    $scope.quitarTodos = function () {
        var asignados = $scope.models.procesos.Asignados;
        angular.forEach(asignados, function (data) {
            $scope.models.procesos.Lista.push(data);
        });
        $scope.models.procesos.Asignados.length = 0;
    };

    $scope.mostrarProcesos = function () {
        // $scope.itemSeleccionado = item;
        $scope.models.procesos.Lista.length = 0;
        $scope.models.procesos.Asignados.length = 0;
        $scope.cargo = false;
        $scope.modificoItem = false;
        apiService.productoProcesos($scope.id_producto).then(function (result) {
            //Se cargan los procesos por item
            angular.forEach(result.data, function (data) {
                if (data.secuencia === null) {
                    $scope.models.procesos.Lista.push(data);
                } else {
                    $scope.models.procesos.Asignados.push(data);
                }
            });
            $timeout(function () {
                $scope.cargo = true;
            });
        });


    };

    $timeout(function () {
        $scope.mostrarProcesos();
    });


    $scope.confirmarModificacion = function () {
        $scope.newmodel = [];
        var contador = 1;
        angular.forEach($scope.models.procesos.Asignados, function (value) {
            $scope.newmodel.push({
                id_proceso: value.id_proceso,
                secuencia: contador++,
                id_producto: $scope.id_producto
            });
        });
        console.log($scope.newmodel);
        apiService.productoProcesosUpdate($scope.newmodel, $scope.id_producto).then(function () {

         });
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
            window.location.href = '/dashboard';
            $scope.modificoProducto = false;
        });


    };


    $scope.$watch('models', function (newValue, oldValue) {
        if ($scope.cargo) {
            $scope.modificoProducto = true;

        }
    }, true);


});