//Se agrego funcionalidad en Angular
var app = angular.module('App', ['dndLists']);

app.constant('SERVERS', {
    SOCKET_SERVER: "http://192.168.2.209:8081",
    DEVELOPMENT_PRINTOMATIK:"http://litoprocess-test-u8j9m.your-printq.com/editor/plugin/",
    PRODUCTION_PRINTOMATIK:"https://www.printomatik.com/editor/plugin/",
    CONN_OPTIONS_SOCKET: {
        path: "/socketserver/socketserver.io"
    }
});



app.controller('Ctrl', function ($scope, apiService) {
    $scope.login = {};
    $scope.envio = function () {
        apiService.login($scope.login).then(function (result) {
            console.log(result.data);
        });
    }
});




