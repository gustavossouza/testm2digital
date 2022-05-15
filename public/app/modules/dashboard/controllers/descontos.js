
dashboard.controller("DescontoController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    $scope.getDiscounts = function() {
        dashboardService.getRegister('discounts').then(function (response) {
            $scope.discounts = response.data;

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
    $scope.getDiscounts();

    dashboardService.getRegister('campaigns').then(function (response) {
        $scope.campaigns = response.data;
    });

    dashboardService.getRegister('products').then(function (response) {
        $scope.products = response.data;
    });

    $scope.cadastro = function() {
        dashboardService.storeRegister('discounts', {
            'campaign_id': $scope.campaign_id,
            'product_id': $scope.product_id,
            'price': $scope.price
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getDiscounts();
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
            $scope.idDiscount = null;
            $scope.campaign_id = null;
            $scope.product_id = null;
            $scope.price = null;
            $scope.titleModal = "Cadastro";
            $("#myModal").modal('show');
        } else {
            $scope.atualizar(parameter)
        }
    }

    $scope.atualizar = function(parameter) {
        $scope.idDiscount = parameter.id;
        $scope.product_id = parameter.product_id;
        $scope.campaign_id = parameter.campaign_id;
        $scope.price = parameter.price;
        $scope.titleModal = "Atualizar";

        $("#myModal").modal('show');
    }

    $scope.modalAtualizar = function() {

        dashboardService.updateRegister('discounts', {
            'id': $scope.idDiscount,
            'product_id': $scope.product_id,
            'campaign_id': $scope.campaign_id,
            'price': $scope.price
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getDiscounts();
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
        dashboardService.deleteRegister('discounts', parameter).then(function (response) {
            $scope.getDiscounts();
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

