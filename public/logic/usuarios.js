app.controller("UsuarioController", function ($scope, apiService) {

    $scope.usuarios = [];
    $scope.lista = true;

    $scope.toogleLista = function () {
        $scope.lista = !$scope.lista;
    };
    apiService.getUsuarios().then(function (result) {
        console.log("Entrando a la promesa");

        $scope.usuarios = result.data;
    });

});