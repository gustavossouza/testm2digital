
dashboard.controller("CidadeController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    $scope.getCities = function() {
        dashboardService.getRegister('cities').then(function (response) {
            $scope.cities = response.data;

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
    $scope.getCities();

    dashboardService.getRegister('groups').then(function (response) {
        $scope.groups = response.data;
    });

    $scope.cadastro = function() {
        dashboardService.storeRegister('cities', {
            'name': $scope.name,
            'group_id': $scope.group_id
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getCities();
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
            $scope.idCity = null;
            $scope.name = null;
            $scope.group_id = null;
            $scope.titleModal = "Cadastro";
            $("#myModal").modal('show');
        } else {
            $scope.atualizar(parameter)
        }
    }

    $scope.atualizar = function(parameter) {
        $scope.idCity = parameter.id;
        $scope.name = parameter.name;
        $scope.group_id = parameter.group_id;
        $scope.titleModal = "Atualizar";

        $("#myModal").modal('show');
    }

    $scope.modalAtualizar = function() {

        dashboardService.updateRegister('cities', {
            'id': $scope.idCity,
            'name': $scope.name,
            'group_id': $scope.group_id
        }).then(function (response) {
            $("#myModal").modal('hide');
            $scope.getCities();
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
        dashboardService.deleteRegister('cities', parameter).then(function (response) {
            $scope.getCities();
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

