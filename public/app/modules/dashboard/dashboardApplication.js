/*==========================================================
    Author      : Ranjithprabhu K
    Date Created: 24 Dec 2015
    Description : Base for Dashboard Application module
    
    Change Log
    s.no      date    author     description     
    

 ===========================================================*/

var dashboard = angular.module('dashboard', ['ui.router', 'ngAnimate','ngMaterial']);


dashboard.config(["$stateProvider", function ($stateProvider) {

    $stateProvider.state('app.produtos', {
        url: '/produtos',
        templateUrl: 'app/modules/dashboard/views/produtos.html',
        controller: 'ProdutoController',
        controllerAs: 'vm',
        data: {
            pageTitle: 'Produtos'
        }
    });

    $stateProvider.state('app.cidades', {
        url: '/cidades',
        templateUrl: 'app/modules/dashboard/views/cidades.html',
        controller: 'CidadeController',
        controllerAs: 'vm',
        data: {
            pageTitle: 'Cidades'
        }
    });

    $stateProvider.state('app.grupos', {
        url: '/grupos',
        templateUrl: 'app/modules/dashboard/views/grupos.html',
        controller: 'GrupoController',
        controllerAs: 'vm',
        data: {
            pageTitle: 'Grupos'
        }
    });

    $stateProvider.state('app.campanhas', {
        url: '/campanhas',
        templateUrl: 'app/modules/dashboard/views/campanhas.html',
        controller: 'CampanhaController',
        controllerAs: 'vm',
        data: {
            pageTitle: 'Campanhas'
        }
    });

    $stateProvider.state('app.descontos', {
        url: '/descontos',
        templateUrl: 'app/modules/dashboard/views/descontos.html',
        controller: 'DescontoController',
        controllerAs: 'vm',
        data: {
            pageTitle: 'Descontos'
        }
    });
}]);

