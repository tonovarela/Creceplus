app.controller("asignacionprocesoController", function ($scope, apiService, $timeout) {

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
        apiService.ItemProcesos($scope.id_item).then(function (result) {
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
                id_item: $scope.id_item
            });
        });
        console.log($scope.newmodel);
        apiService.ItemProcesosUpdate($scope.newmodel, $scope.id_item).then(function () {
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
            swal("Listo!", "Los procesos del item se han actualizado.", "success");
            window.location.href = '/dashboard/catalogos/items';
            $scope.modificoItem = false;
        });


    };


    $scope.$watch('models', function (newValue, oldValue) {
        if ($scope.cargo) {
            $scope.modificoItem = true;

        }
    }, true);


});