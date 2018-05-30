

app.controller("itemController", function ($scope, apiService) {

    $scope.result = {};
    $scope.catalogo = [];
    $scope.sku = '';
    $scope.n = {};
    $scope.modelo = {};
    $scope.modelo.activo='1';
    $scope.errors = [];
    apiService.getCatalogo().then(function (result) {
        $scope.catalogo = result.data;
    });


    $scope.save = function () {
        $scope.modelo.sku = $scope.sku;
        apiService.saveItem($scope.modelo).then(function (result) {
            $scope.result = result;
            if (result.data.error == "1") {
                swal(result.data.mensaje, 'El SKU ya existe', "error");
            } else {
                swal({
                        title: "Bien",
                        text: result.data.mensaje,
                        type: "success"
                    },
                    function () {
                        window.location.href = 'dashboard/catalogos/items';
                    });

            }

        });
    };

    /**
     * @return {number}
     */
    $scope.Numero = function (value) {
        return isNaN(value) === true ? 0 : value;
    };


    $scope.$watch('modelo', function (model) {

        $scope.n = {
            categoria: ('000' + Math.round($scope.Numero(model.id_categoria))).slice(-3),
            medida: ('000' + Math.round($scope.Numero(model.id_medida))).slice(-3),
            tipo: ('000' + Math.round($scope.Numero(model.id_tipopapel))).slice(-3),
            frente: ('0' + $scope.Numero(model.frente)).slice(-1),
            vuelta: ('0' + $scope.Numero(model.vuelta)).slice(-1)
        };


        $scope.sku = $scope.n.categoria +
            $scope.n.medida +
            $scope.n.tipo +
            $scope.n.frente +
            $scope.n.vuelta;
    }, true);

});
app.controller("itemEditController", function ($scope, $timeout, apiService) {

    $scope.result = {};
    $scope.catalogos = [];
    $scope.sku = '';
    $scope.n = {};
    $scope.modelo = {};
    $scope.errors = [];


    $timeout(function () {
        apiService.ItemInfo($scope.modelo.item.id_item).then(function (result) {
            $scope.catalogos.tipos = result.data.Tipos;
            $scope.catalogos.categorias = result.data.Categorias;
            $scope.catalogos.medidas = result.data.Medidas;
            $scope.modelo.item = result.data.Item;
            $scope.modelo.item.frente = (result.data.Item.sku).slice(9, 10);
            $scope.modelo.item.vuelta = (result.data.Item.sku).slice(10, 11);



        });
    });


    $scope.actualizar = function () {
        $scope.modelo.item.sku = $scope.sku;
        apiService.updateItem($scope.modelo.item).then(function (result) {
            if (result.data.error == "1") {
                swal(result.data.mensaje, 'El SKU ya existe', "error");
            } else {
                swal({
                        title: "Bien",
                        text: result.data.mensaje,
                        type: "success"
                    },
                    function () {
                        window.location.href = '/dashboard/catalogos/items';
                    });

            }

        });
    };

    /**
     * @return {number}
     */
    $scope.Numero = function (value) {
        return isNaN(value) === true ? 0 : value;
    };


    $scope.$watch('modelo.item', function (model) {
        $scope.n = {
            categoria: ('000' + Math.round($scope.Numero(model.id_categoria))).slice(-3),
            tipo: ('000' + Math.round($scope.Numero(model.id_tipopapel))).slice(-3),
            medida: ('000' + Math.round($scope.Numero(model.id_medida))).slice(-3),
            frente: ('0' + $scope.Numero(model.frente)).slice(-1),
            vuelta: ('0' + $scope.Numero(model.vuelta)).slice(-1)
        };


        $scope.sku = $scope.n.categoria +
            $scope.n.medida +
            $scope.n.tipo +
            $scope.n.frente +
            $scope.n.vuelta;
    }, true);
});
app.controller("itemListController", function ($scope, apiService) {

$scope.modelo=[];
    apiService.ItemList().then(function (result) {
        $scope.modelo.items=result.data;

    });


});

// app.controller("itemController", function ($scope) {
//     $scope.models = {
//
//         procesos: {
//             "Asignados": [],
//             "Lista": []
//         }
//     };
//
//     for (var i = 1; i <= 3; ++i) {
//         $scope.models.procesos.Asignados.push({
//             label: "Item A",
//             ItemID: i
//         });
//         $scope.models.procesos.Lista.push({
//             label: "Item B" + i,
//             ItemID: i
//         });
//     }
//
//
//     $scope.aplicarCambios = function () {
//
//             swal({
//                 title: "Información",
//                 text: "Desea aplicar los cambios?",
//                 type : "warning",
//                 showCancelButton : true,
//                 confirmButtonColor : "#DD6B55",
//                 confirmButtonText : "Si, aplicarlos!",
//                 cancelButtonText : "No, cancelar",
//                 closeOnConfirm : false,
//                 closeOnCancel : false
//               }, function (isConfirm) {
//                 if (isConfirm) {
//                   swal("Guardado!", "Los cambios han sido aplicados.", "success");
//                 } else {
//                   swal("Cancelado", "No se realizo ningun cambio)", "error");
//                 }
//               });
//
//
//
//     }
//
//
//     $scope.quitarTodos = function () {
//         angular.forEach($scope.models.procesos.Asignados, function (value, key) {
//             $scope.models.procesos.Lista.push({
//                 label: value.label,
//                 itemID: value.itemID
//             });
//         });
//         $scope.models.procesos.Asignados.length = 0;
//
//     }
//
//
//
//     // Model to JSON for demo purpose
//     $scope.$watch('models', function (model) {
//         $scope.modelAsJson = angular.toJson(model, true);
//     }, true);
//
// });