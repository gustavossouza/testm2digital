
dashboard.controller("GrupoController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    dashboardService.getGrupos().then(function (response) {
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
}]);

