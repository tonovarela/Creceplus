
app.service('apiPrintomatik',function(SERVERS,$http){
    var server = SERVERS.DEVELOPMENT_PRINTOMATIK;

    this.getProductsList= function () {
        return $http.get(server + 'productos.php');
    };

    this.getProductbySKU= function (sku) {
        return $http.get(server + 'producto.php?sku='+sku);
    };

});