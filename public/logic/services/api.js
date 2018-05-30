app.service('apiService', function (SERVERS, $http) {
    var server =base_path;


    this.getServerPath=function(){
      return server;
    };

    // this.login = function (login) {
    //     return $http.post(server + '/api/v1/login', {
    //         data: login
    //     });
    // };





    this.getProductoProcesosPorSKU = function (sku) {
        return $http.get(server + '/api/v2/producto/listarProcesosPorSKU/' + sku);
    };

    this.productoProcesosUpdate = function (info,producto) {
        return $http.post(server + '/api/v2/producto/procesosUpdate', {
            info: info,
            producto: producto
        });
    };

    this.productoProcesosTotal = function () {
        return $http.get(server + '/api/v2/producto/listarTotalProcesos');
    };





    //Items


    this.ItemList = function () {
        return $http.get(server + '/api/v1/itemlist/');
    };
    this.ItemProcesos = function (id_item) {
        return $http.get(server + '/api/v1/itemlistprocesos/' + id_item);
    };

    this.ItemProcesosUpdate = function (info, id_item) {
        return $http.post(server + '/api/v1/itemprocesosupdate', {
            info: info,
            id_item: id_item
        });
    };


    this.ItemInfo = function (id) {
        return $http.get(server + '/api/v1/iteminfo/' + id);
    };
    this.saveItem = function (item) {
        return $http.post(server + '/api/v1/itemsave', {
            item: item
        });
    };
    this.updateItem = function (item) {
        return $http.post(server + '/api/v1/itemupdate', {
            item: item
        });
    };
    this.getCatalogo = function () {
        return $http.get(server + '/api/v1/itemcatalogo');
    };

    this.getUsuarios = function () {
        return $http.get(server + '/api/v1/usuarios');
    };

    this.getOrdenes = function () {
        return $http.get(server + '/api/v1/ordenes');
    };

    this.getProductosPorOrden = function (numeroOrden) {
        return $http.get(server + '/api/v1/orden/productos/' + numeroOrden);
    };

    this.productoProcesos = function (idproducto) {
        return $http.get(server + '/api/v1/productoprocesos/list/' + idproducto);
    };

    // this.productoProcesosUpdate = function (info, id_producto) {
    //     return $http.post(server + '/api/v1/productoprocesos/update', {
    //         info: info,
    //         id_producto: id_producto
    //     });
    // };

    //Aside
    this.getTotalProcesosActuales = function () {
        return $http.get(server + '/api/v1/totalprocesosactuales');
    };

    this.getEstacionesPorProceso=function(idproceso){
        return $http.get(server+'/api/v1/estacionesporproceso/'+idproceso);
    }

    this.getProductosPorProcesar=function(idproceso){
        return $http.get(server+"/api/v1/productosporprocesar/"+idproceso);

    }




});