﻿
dashboard.controller("CidadeController", ['$rootScope', '$scope', '$state', '$location', 'dashboardService', 'Flash',
function ($rootScope, $scope, $state, $location, dashboardService, Flash) {
    var vm = this;

    vm.home = {};
    dashboardService.getCidades().then(function (response) {
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
}]);

