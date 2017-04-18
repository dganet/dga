 app.controller("painelCtrl", function($scope, $http, $timeout , $location, $sessionStorage){
//Pegando Dados do Logado
var nomeUsuario = sessionStorage.getItem('usuario.nome');
var sobrenome = sessionStorage.getItem('usuario.sobrenome');
var token = sessionStorage.getItem('usuario.token');

$scope.nomeUsuario = nomeUsuario;
$scope.sobrenome = sobrenome;
$scope.token = token;

 });