
dashboard.controller("GrupoController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    $scope.getGrups = function() {
        dashboardService.getRegister('groups').then(function (response) {
            $scope.groups = response.data;
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
    $scope.getGrups();

    dashboardService.getRegister('campaigns').then(function (response) {
        $scope.campaigns = response.data;
    });   

    $scope.cadastro = function() {
        dashboardService.storeRegister('groups', {
            'name': $scope.name,
            'campaign_id': $scope.campaign_id
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getGrups();
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
            $scope.idGroup = null;
            $scope.name = null;
            $scope.campaign_id = null;
            $scope.titleModal = "Cadastro";
            $("#myModal").modal('show');
        } else {
            $scope.atualizar(parameter)
        }
    }

    $scope.atualizar = function(parameter) {
        $scope.idGroup = parameter.id;
        $scope.name = parameter.name;
        $scope.campaign_id = parameter.campaign_id;
        $scope.titleModal = "Atualizar";

        $("#myModal").modal('show');
    }

    $scope.modalAtualizar = function() {

        dashboardService.updateRegister('groups', {
            'id': $scope.idGroup,
            'name': $scope.name,
            'campaign_id': $scope.campaign_id
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getGrups();
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
        dashboardService.deleteRegister('groups', parameter).then(function (response) {
            $scope.getGrups();
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

