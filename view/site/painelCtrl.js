 app.controller("painelCtrl", function($scope, $http, $timeout , $location){
    //Mostra o Link Nova Conta
    $scope.newcount = true;
    $scope.login = true;
    //Oculta o Link Nova Conta e Mostra o Form de Autenticação
    $scope.loginAction = function (){
        $scope.autentication = true; 
        $scope.newcount = true;
        $scope.login = false;
    };
 });