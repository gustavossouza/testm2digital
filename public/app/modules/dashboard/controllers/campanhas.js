
dashboard.controller("CampanhaController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    dashboardService.getCampanhas().then(function (response) {
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
    
}]);

