app.controller("portalCtrl", function($scope, $http,$location , $timeout, $sessionStorage ){
//Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');
var nome = sessionStorage.getItem('usuario.nome');
var foto = sessionStorage.getItem('usuario.foto');
var endereco = sessionStorage.getItem('usuario.endereco');
var bairro = sessionStorage.getItem('usuario.bairro');
var cidade = sessionStorage.getItem('usuario.cidade');
var cep = sessionStorage.getItem('usuario.cep');


$scope.nome = nome;
$scope.endereco = endereco;
$scope.bairro = bairro;
$scope.cidade = cidade;
$scope.cep = cep ;

		$http.get('./App/imagem/list/'+ foto).success(function(data){
            $scope.foto = data.nome;
	
	});

});