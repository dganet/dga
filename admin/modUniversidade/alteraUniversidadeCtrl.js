app.controller("alteraUniversidadeCtrl", function($scope,$http, restful,$location , $timeout, $sessionStorage ){

$scope.quatro = false;

//Lista os Usuarios
	restful.universidadeList().success(function(data){
		$scope.universidades = data;

	});

// Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		restful.universidadeListId(id).success(function(data){
		$scope.universidade = data[0];
		
	});

	}
//	

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
  //Ocultando o Alert Mensagem .
  $scope.mensagemDeleta = true;

//*************UPDATE CURSO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormUniversidade) {

	 $scope.dados = values;
	 var id = $scope.dados.id;

    // Enviado os valores em objetos para api/user do php/slim
    $http.put('../App/universidade/update/'+ idUsuario , values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/universidade/altera');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);

    $http.get('../App/universidade/list').success(function(data){
    $scope.cursos = data;
     });

    // Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){

  $scope.quatro = true;

  var id = $scope.id = values;

    $http.get('../App/universidade/list/'+ id).success(function(data){
    $scope.curso = data[0];
    
  });

  }

    $scope.quatro = false;

  });

};


//*************DELETE NOTICIA *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.deleta = function(values) {

    // Enviado os valores em objetos para api/user do php/slim
    $http.delete('../App/universidade/delete/'+ idUsuario, values).success(function(){
    // Depois mandando para mesma pagina  
    $scope.activePath = $location.path('/user/universidade/altera');
   
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDeleta = false;
      $timeout(function () {
               $scope.mensagemDeleta = true;
           },10000);


    $http.get('../App/universidade/list').success(function(data){
    $scope.cursos = data;

    });

    $scope.quatro = false;
    });
  };

});