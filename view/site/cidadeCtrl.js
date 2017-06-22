 app.controller("cidadeCtrl", function($scope, $http, $timeout , $location, $sessionStorage,$kookies){
//Pegando Token
 var nomeCidade = sessionStorage.getItem('cidade.nome');
$scope.nomeCidade = nomeCidade;
 });//END do controller