
dashboard.controller("ProdutoController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};

    $scope.getProducts = function() {
        dashboardService.getRegister('products').then(function (response) {
            $scope.products = response.data;
            vm.home.mainData = [
                {
                    title: "Total",
                    value: response.data.length,
                    theme: "aqua",
                    icon: "puzzle-piece"
                }
            ];
        });
    }
    $scope.getProducts();

    $scope.cadastro = function() {
        dashboardService.storeRegister('products', {
            'name': $scope.name,
            'price': $scope.price
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getProducts();
        }, function(response) {
            $.amaran({
                'theme': 'colorful',
                'content': {
                    bgcolor: '#FF0000',
                    color: '#fff',
                    message: response.data.errors,
                    delay     : 5000
                },
                'position': 'bottom right',
                'outEffect': 'slideBottom'
            });
        });
    }

    $scope.openModal = function (parameter = null) {
        if (parameter == null) {
            $scope.idProduct = null;
            $scope.name = null;
            $scope.price = null;
            $scope.titleModal = "Cadastro";
            $("#myModal").modal('show');
        } else {
            $scope.atualizar(parameter)
        }
    }

    $scope.atualizar = function(parameter) {
        $scope.idProduct = parameter.id;
        $scope.name = parameter.name;
        $scope.price = parameter.price;
        $scope.titleModal = "Atualizar";

        $("#myModal").modal('show');
    }

    $scope.modalAtualizar = function() {

        dashboardService.updateRegister('products', {
            'id': $scope.idProduct,
            'name': $scope.name,
            'price': $scope.price
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getProducts();
        }, function(response) {
            $.amaran({
                'theme': 'colorful',
                'content': {
                    bgcolor: '#FF0000',
                    color: '#fff',
                    message: response.data.errors,
                    delay     : 5000
                },
                'position': 'bottom right',
                'outEffect': 'slideBottom'
            });
        });
    }

    $scope.excluir = function(parameter){
        dashboardService.deleteRegister('products', parameter).then(function (response) {
            $scope.getProducts();
        }, function(response) {
            $.amaran({
                'theme': 'colorful',
                'content': {
                    bgcolor: '#FF0000',
                    color: '#fff',
                    message: response.data.errors,
                    delay     : 5000
                },
                'position': 'bottom right',
                'outEffect': 'slideBottom'
            });
        });
    }
}]);

