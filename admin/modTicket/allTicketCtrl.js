app.controller("allTicketCtrl", function($scope, $http,$location , $timeout, $sessionStorage ){
//Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');

$scope.quatro = false;

//Lista os Cursos
	$http.get('../App/ticket/listTicketAssoc').success(function(data){
   $scope.associados = data;
	});

// Seleciona o usuario e mostra do Lado.
$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		$http.get('../App/cursofaculdade/list/'+ id).success(function(data){
		$scope.curso = data[0];

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
  $scope.add = function(values, FormCurso) {

	 $scope.dados = values;
	 var id = $scope.dados.id;

    // Enviado os valores em objetos para api/user do php/slim
    $http.put('../App/cursofaculdade/update/'+ idUsuario , values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/curso/altera');

      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);

    $http.get('../App/cursofaculdade/list').success(function(data){
    $scope.cursos = data;
     });

    // Seleciona o usuario e mostra do Lado.
$scope.dados = function (values){

  $scope.quatro = true;

  var id = $scope.id = values;

    $http.get('../App/cursofaculdade/list/'+ id).success(function(data){
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
    $http.delete('../App/cursofaculdade/delete/'+ idUsuario, values).success(function(){
    // Depois mandando para mesma pagina  

    $scope.activePath = $location.path('/user/curso/altera');

      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDeleta = false;
      $timeout(function () {
               $scope.mensagemDeleta = true;
           },10000);


    $http.get('../App/cursofaculdade/list').success(function(data){
    $scope.cursos = data;

    });

    $scope.quatro = false;
    });
  };

});
