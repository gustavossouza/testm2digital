
dashboard.controller("CampanhaController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    $scope.getCampaigns = function() {
        dashboardService.getRegister('campaigns').then(function (response) {
            $scope.campaigns = response.data;

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
    $scope.getCampaigns();

    dashboardService.getRegister('products').then(function (response) {
        $scope.products = response.data;
    });

    $scope.cadastro = function() {
        dashboardService.storeRegister('campaigns', {
            'name': $scope.name,
            'product_id': $scope.product_id
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getCampaigns();
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
            $scope.idCampaign = null;
            $scope.name = null;
            $scope.product_id = null;
            $scope.titleModal = "Cadastro";
            $("#myModal").modal('show');
        }

        $scope.atualizar(parameter)
    }

    $scope.atualizar = function(parameter) {
        $scope.idCampaign = parameter.id;
        $scope.name = parameter.name;
        $scope.product_id = parameter.product_id;
        $scope.titleModal = "Atualizar";

        $("#myModal").modal('show');
    }

    $scope.modalAtualizar = function() {

        dashboardService.updateRegister('campaigns', {
            'id': $scope.idCampaign,
            'name': $scope.name,
            'product_id': $scope.product_id
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getCampaigns();
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
        dashboardService.deleteRegister('campaigns', parameter).then(function (response) {
            $scope.getCampaigns();
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

