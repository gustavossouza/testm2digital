/*==========================================================
   Author      : Ranjithprabhu K
   Date Created: 05 Jan 2016
   Description : To handle the service for Dashboard module
   
   Change Log
   s.no      date    author     description     
===========================================================*/


dashboard.service('dashboardService', ['$http', '$q', 'Flash', 'apiService', function ($http, $q, Flash, apiService) {

    var dashboardService = {};


    //service to communicate with users model to verify login credentials
    var accessLogin = function (parameters) {
        var deferred = $q.defer();
        apiService.get("users", parameters).then(function (response) {
            if (response)
                deferred.resolve(response);
            else
                deferred.reject("Something went wrong while processing your request. Please Contact Administrator.");
        },
            function (response) {
                deferred.reject(response);
            });
        return deferred.promise;
    };

    //service to communicate with users to include a new user
    var registerUser = function (parameters) {
        var deferred = $q.defer();
        apiService.create("users", parameters).then(function (response) {
            if (response)
                deferred.resolve(response);
            else
                deferred.reject("Something went wrong while processing your request. Please Contact Administrator.");
        },
            function (response) {
                deferred.reject(response);
            });
        return deferred.promise;
    };

    var getCampanhas = function () {
        var deferred = $q.defer();
        apiService.get("campaigns").then(function (response) {
            if (response)
                deferred.resolve(response);
            else
                deferred.reject("Something went wrong while processing your request. Please Contact Administrator.");
        },
            function (response) {
                deferred.reject(response);
            });
        return deferred.promise;
    }

    var getCidades = function () {
        var deferred = $q.defer();
        apiService.get("cities").then(function (response) {
            if (response)
                deferred.resolve(response);
            else
                deferred.reject("Something went wrong while processing your request. Please Contact Administrator.");
        },
            function (response) {
                deferred.reject(response);
            });
        return deferred.promise;
    }

    var getDescontos = function () {
        var deferred = $q.defer();
        apiService.get("discounts").then(function (response) {
            if (response)
                deferred.resolve(response);
            else
                deferred.reject("Something went wrong while processing your request. Please Contact Administrator.");
        },
            function (response) {
                deferred.reject(response);
            });
        return deferred.promise;
    }

    var getGrupos = function () {
        var deferred = $q.defer();
        apiService.get("groups").then(function (response) {
            if (response)
                deferred.resolve(response);
            else
                deferred.reject("Something went wrong while processing your request. Please Contact Administrator.");
        },
            function (response) {
                deferred.reject(response);
            });
        return deferred.promise;
    }

    var getProdutos = function () {
        var deferred = $q.defer();
        apiService.get("products").then(function (response) {
            if (response)
                deferred.resolve(response);
            else
                deferred.reject("Something went wrong while processing your request. Please Contact Administrator.");
        },
            function (response) {
                deferred.reject(response);
            });
        return deferred.promise;
    }

    dashboardService.accessLogin = accessLogin;
    dashboardService.registerUser = registerUser;
    dashboardService.getCampanhas = getCampanhas;
    dashboardService.getCidades = getCidades;
    dashboardService.getDescontos = getDescontos;
    dashboardService.getGrupos = getGrupos;
    dashboardService.getProdutos = getProdutos;

    return dashboardService;

}]);
