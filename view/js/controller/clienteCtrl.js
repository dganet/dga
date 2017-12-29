 app.controller("clienteCtrl", function($scope, $timeout , $location, restful){

  //Pega o Token 
  var token = sessionStorage.getItem('usuario.token'); 
  //Pega o idUsuario 
  var idUsuario = sessionStorage.getItem('usuario.idUsuario'); 
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;

//Novo registro. zera todas informaçoes do objeto
    $scope.novo = function(){
      $scope.cliente = {};  
    };

  //Lista todos os clientes
    restful.clienteList(token).success(function(data){
        $scope.clientes = data;
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
      restful.clienteListId(idCliente).success(function(data){
        console.log($scope.cliente = data[0]);  
          });
    };

//*************CADASTRA NOVO CLIENTE *********************// 

  //Passa os valores do form em Objeto no "values"
  $scope.add = function(values, formCliente) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.clienteSave(values,token).success(function(response){
      // Fecha o Modal
      $('#closeModalPost').modal('hide');
    
    //Lista todas Cursos
    restful.clienteList(token).success(function(data){
    $scope.clientes = data;       
  });
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemSucesso = false;
      $timeout(function () {
               $scope.mensagemSucesso = true;
           },10000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.cliente = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

//************* UPDATE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, formCliente) {
    console.log(values);
    // Enviado os valores em objetos para api/user do php/slim
    restful.clientePut(values,token).success(function(){
     // Fecha o Modal
      $('#closeModalUpdate').modal('hide');

        //Lista todas Cursos
        restful.clienteList(token).success(function(data){
            $scope.clientes = data;       
        });
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemAtualizado = false;
      $timeout(function () {
               $scope.mensagemAtualizado = true;
           },10000);

    });

};

//************* DELETE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.del = function(values) {
    console.log(values);
    // Enviado os valores em objetos para api/user do php/slim
    restful.clienteDel(values,token).success(function(){
    // Fecha o Modal
      $('#closeModalDel').modal('hide');
        
     //Lista todas Cursos
        restful.clienteList().success(function(data){
            $scope.clientes = data;       
        });
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDelete = false;
      $timeout(function () {
               $scope.mensagemDelete = true;
           },10000);

    });
  };

 });//END do controller