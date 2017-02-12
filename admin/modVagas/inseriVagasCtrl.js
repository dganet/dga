app.controller("inseriVagasCtrl",function($scope, $http,$location , $timeout){
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

//*************CADASTRA NOVO USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormVagas) {
  	
        // Enviado os valores em objetos para api/user do php/slim
    $http.post('../App/periodo/save', values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/usuario/inseri');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.cliente = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

});