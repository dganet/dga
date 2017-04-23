 app.controller("clienteCtrl", function($scope, $http, $timeout , $location, $sessionStorage){
//Pegando Token
 var token = sessionStorage.getItem('usuario.token');

//Oculta a Mensagem de sucesso
$scope.mensagemSucesso = false;

//Scope Vazio
$scope.master = {};


//*************CADASTRA NOVO CLIENTE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, formCliente) {
            // Enviado os valores em objetos para api/user do php/slim
            $http.post('App/cliente/save/'+ token , values).success(function(){
                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagemSucesso = true;
                $timeout(function () {
                        $scope.mensagemSucesso = false;
                    },10000);
                //Resentando os input do formulario .
                $scope.reset = function() {
                // Copiando os valores vazio do scope.master 
                $scope.cliente = angular.copy($scope.master);
                };
                // Ativando a função
                $scope.reset();
             });


  };

  //*************UPDATE CLIENTE *********************// 

  //Lista todos os clientes
    $http.get('App/cliente/list/'+ token).success(function(data){
        $scope.clientes = data;
    });

  // Seleciona o usuario e mostra do Lado.
    $scope.janela = function (values){
  //Show na div modeloA
    $scope.modeloA4 = true;
  //Pega o ID
	var id = $scope.id = values;
  //Pega os Dados do Cliente selecionado.

		$http.get('App/cliente/listId/'+ id + '/'+ token).success(function(data){
      console.log(data);
		$scope.cliente = data[0];
	});

	}
 });//END do controller