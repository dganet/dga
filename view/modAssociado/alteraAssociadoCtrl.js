app.controller("alteraAssociadoCtrl", function($scope, $http,$location , $timeout ){
	$scope.tabs = "true";
$scope.tab1 = true;

$scope.go = function (dados){

	if (dados == 'tab1'){
		$scope.tab1 = true;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;
	
	}

	if (dados == 'tab2'){
		$scope.tab1 = false;
		$scope.tab2 = true;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;
	

	}

	if (dados == 'tab3'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = true;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab4'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = true;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab5'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = true;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab6'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = true;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab7'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = true;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab8'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = true;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab9'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = true;
		$scope.tab10 = false;

	}


	if (dados == 'tab10'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = true;

	}

	}



$scope.quatro = false;

//Lista os Usuarios
	$http.get('App/associado/list').success(function(data){
		$scope.associados = data;

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
