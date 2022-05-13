
dashboard.controller("DescontoController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    dashboardService.getDescontos().then(function (response) {
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
}]);

