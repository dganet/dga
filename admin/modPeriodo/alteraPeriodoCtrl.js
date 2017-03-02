app.controller("alteraPeriodoCtrl", function($scope, $http,$location , $timeout ){

$scope.quatro = false;

//Lista os Usuarios
	$http.get('../App/periodo/list').success(function(data){
		$scope.periodos = data;

	});

// Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		$http.get('../App/periodo/list/'+ id).success(function(data){
		data[0]['dataInicio'] = new Date(data[0]['dataInicio']);
    data[0]['dataFinal'] = new Date(data[0]['dataFinal']);
    $scope.periodo = data[0];

	});

	}
//	

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
    //Ocultando o Alert Mensagem .
  $scope.mensagemDeleta = true;

//*************UPDATE  *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormPeriodo) {

	 $scope.dados = values;
	 var id = $scope.dados.id;

    // Enviado os valores em objetos para api/user do php/slim
    $http.put('../App/periodo/update/'+ id , values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/periodo/altera');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);

      //oculta lado direito
       $scope.quatro = false;

          $http.get('../App/periodo/list').success(function(data){
          $scope.periodos = data;
           });


    });

////////////////////////////////////////////////////////////////////////////////

	$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		$http.get('../App/periodo/list/'+ id).success(function(data){
		data[0]['dataInicio'] = new Date(data[0]['dataInicio']);
    data[0]['dataFinal'] = new Date(data[0]['dataFinal']);
    $scope.periodo = data[0];
		
	});

	}



     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.periodo = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

    $scope.quatro = false;


  };


//Passa os valores do form em Objeto no "values"
  $scope.deleta = function(values) {

    // Enviado os valores em objetos para api/user do php/slim
    $http.delete('../App/periodo/delete/'+ values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/periodo/altera');

         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDeleta = false;
      $timeout(function () {
               $scope.mensagemDeleta = true;
           },10000);
    });
    
         

    $http.get('../App/periodo/list').success(function(data){
    $scope.periodos = data;

  });

    $scope.quatro = false;

  };

});