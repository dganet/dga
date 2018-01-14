 app.controller("painelCtrl", function($scope, restful, $timeout , $location, $sessionStorage){
//Pegando Dados do Logado
var nomeUsuario = sessionStorage.getItem('usuario.nome');
var sobrenome = sessionStorage.getItem('usuario.sobrenome');
var token = sessionStorage.getItem('usuario.token');


$scope.nomeUsuario = nomeUsuario;
$scope.sobrenome = sobrenome;
$scope.token = token;

// Sai do Sistema
$scope.logout = function(){
		var values = {'token':token};
		restful.logout(values).success(function(response){
			 $scope.activePath = $location.path('/site/inicio');
		});	
	};

 });