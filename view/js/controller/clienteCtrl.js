 app.controller("clienteCtrl", function($scope, $http, $timeout , $location, restful){

   //Pega o Token 
  var token = sessionStorage.getItem('usuario.token'); 

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;

  //Lista todos os clientes
    restful.clienteList().success(function(data){
        $scope.clientes = data;
        console.log(data);
    });

  // Show modaais de detalhes, alterar e deletar.
  $scope.dados = function (idCliente){
      //Resentando 
      $scope.reset = function() {
      // Copiando os valores vazio do scope.master 
        $scope.cliente = angular.copy($scope.master);
      };
      // Ativando a função
      $scope.reset();
          //Pega as info da universidade selecionada
      restful.clienteListId(id).success(function(data){
      $scope.cliente = data[0];  
          });
    };

//*************CADASTRA NOVO CLIENTE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, formCliente) {
            // Enviado os valores em objetos para api/user do php/slim
            restful.clienteSave(values).success(function(){
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

    // Seleciona o usuario e mostra do Lado.
  $scope.janela = function (values){
      //Show na div modeloA
        $scope.modeloA4 = true;
      //Pega o ID
      var id = $scope.id = values;
      //Pega os Dados do Cliente selecionado.
        restful.clienteListId(id).success(function(data){
          $scope.cliente = data[0];
        });
  }

 });//END do controller