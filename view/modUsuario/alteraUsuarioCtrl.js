app.controller("alteraUsuarioCtrl", function($scope, $http,$location , $timeout , $rootScope){

$scope.quatro = false;

//Lista os Usuarios
	$http.get('App/usuario/list').success(function(data){
		$scope.usuarios = data;

	});

// Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		$http.get('App/usuario/list/'+ id).success(function(data){
		$scope.usuario = data[0];
		
	});

	}
//	

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

//*************UPDATE USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormUsuario) {

	 $scope.dados = values;
	 var id = $scope.dados.id;

    // Enviado os valores em objetos para api/user do php/slim
    $http.put('App/usuario/update/'+ id , values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/usuario/altera');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);
    });

    $http.get('App/usuario/list').success(function(data){
		$scope.usuarios = data;

	});

	$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		$http.get('App/usuario/list/'+ id).success(function(data){
		$scope.usuario = data[0];
		
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