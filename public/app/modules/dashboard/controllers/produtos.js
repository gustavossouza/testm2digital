
dashboard.controller("ProdutoController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    dashboardService.getProdutos().then(function (response) {
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
}]);

