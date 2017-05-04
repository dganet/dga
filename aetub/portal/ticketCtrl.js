app.controller('ticketCtrl', function($scope, $http,$location , $timeout , $sessionStorage){
  //Pega o Id do Usuario Logado
var id = sessionStorage.getItem('usuario.id');
console.log(id);
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

$scope.tabs = "true";
$scope.tab1 = true;

$scope.go = function (dados){

	if (dados == 'tab1'){
		$scope.tab1 = true;
		$scope.tab2 = false;
		$scope.tab3 = false;
	}

	if (dados == 'tab2'){
		$scope.tab1 = false;
		$scope.tab2 = true;
		$scope.tab3 = false;
	}

	if (dados == 'tab3'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = true;
	}

	}

$scope.add = function (values,FormTicket){
    console.log(values);
        // Enviado os valores em objetos para api/user do php/slim
    $http.post('../App/ticket/save/'+ id , values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/portal/ticket');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);

     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.ticket = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

    });

  };

});