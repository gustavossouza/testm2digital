
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

    dashboardService.getRegister('cities/getByGroupNull').then(function (response) {
        $scope.cities = response.data;
    });   

    $scope.cadastro = function() {
        dashboardService.storeRegister('groups', {
            'name': $scope.name,
            'city_id': $scope.city_id
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
            $scope.city_id = null;
            $scope.titleModal = "Cadastro";
            $("#myModal").modal('show');
        } else {
            $scope.atualizar(parameter)
        }
    }

    $scope.atualizar = function(parameter) {
        $scope.idGroup = parameter.id;
        $scope.name = parameter.name;
        $scope.city_id = parameter.city_id;
        $scope.titleModal = "Atualizar";

        $("#myModal").modal('show');
    }

    $scope.modalAtualizar = function() {

        dashboardService.updateRegister('groups', {
            'id': $scope.idGroup,
            'name': $scope.name,
            'city_id': $scope.city_id
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

