app.controller("homeCtrl", function($scope, $http,$location , $timeout, $sessionStorage ){
//Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');
var nome = sessionStorage.getItem('nome.id');
var endereco = sessionStorage.getItem('endereco.id');
var bairro = sessionStorage.getItem('bairro.id');
var cidade = sessionStorage.getItem('cidade.id');
var cep = sessionStorage.getItem('cep.id');

$scope.nome = nome;
$scope.endereco = endereco;
$scope.bairro = bairro;
$scope.cidade = cidade;
$scope.cep = cep ;

});