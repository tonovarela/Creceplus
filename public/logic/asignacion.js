app.controller("asignacionController", function ($scope, apiService, $timeout) {

    $scope.datos = [];
    $scope.itemSeleccionado = null;
    $scope.itemInfo=null;
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


    apiService.ItemList().then(function (result) {
        $scope.datos.items = result.data;

    });

    $scope.quitarTodos = function () {
        var asignados = $scope.models.procesos.Asignados;
        angular.forEach(asignados, function (data) {
            $scope.models.procesos.Lista.push(data);
        });
        $scope.models.procesos.Asignados.length = 0;
    };

    $scope.mostrarProcesos = function (item) {

        $scope.itemSeleccionado = item;
        $scope.models.procesos.Lista.length = 0;
        $scope.models.procesos.Asignados.length = 0;
        $scope.cargo = false;
        $scope.modificoItem = false;
        apiService.ItemProcesos(item.id_item).then(function (result) {
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

    $scope.mostrarInfo = function (item) {
        $scope.itemInfo=item;
    };
    $scope.cancelarModificacion = function () {
        $scope.itemSeleccionado = null;
    };


    $scope.confirmarModificacion = function (item) {
        $scope.newmodel = [];
        var contador = 1;
        angular.forEach($scope.models.procesos.Asignados, function (value) {
            $scope.newmodel.push({
                id_proceso: value.id_proceso,
                secuencia: contador++,
                id_item: item.id_item
            });
        });

        apiService.ItemProcesosUpdate($scope.newmodel, item.id_item).then(function () {
        });
    };

    $scope.guardarModificacion = function (item) {
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
            $scope.confirmarModificacion(item);
            swal("Listo!", "Los procesos del item se han actualizado.", "success");
            $scope.modificoItem = false;


        });


    };


    $scope.$watch('models', function (newValue, oldValue) {
        if ($scope.cargo) {
            $scope.modificoItem = true;
            console.log("YA cambio")
        }
    }, true);


});