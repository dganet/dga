app.controller("portalAssociadoCtrl", function($scope, $http,$location , $timeout, $sessionStorage ){
//Pega o Id do Usuario Logado
var id = sessionStorage.getItem('usuario.id');


$scope.quatro = false;

//Lista os Usuarios
	$http.get('App/associado/list').success(function(data){
		$scope.associados = data;

	});

// Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){
	
	$scope.quatro = true;
	var idAssociado = $scope.id = values;

		$http.get('App/associado/list/'+ idAssociado).success(function(data){
		var teste = $scope.associado = data[0];
	});

	}
//	

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

//************* UPDATE ASSOCIADO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormPortal) {

    // Enviado os valores em objetos para api/user do php/slim
	 $http.put('App/associado/update/'+ id , values).success(function(response){

      // Depois mandando para mesma pagina  
    	 $scope.activePath = $location.path('/user/associado/portal');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);
    });

    $http.get('App/associado/list').success(function(data){
		$scope.associados = data;

	});

	$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		$http.get('App/associado/list/'+ id).success(function(data){
		$scope.associado = data[0];
		
	});

	}



     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.cliente = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };


});
