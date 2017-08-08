app.controller("inseriNoticiaCtrl",function($scope, restful,$location , $timeout , $sessionStorage){

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

//*************CADASTRA NOVO USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormNoticia) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.noticiaSave(values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/noticia/inseri');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.noticia = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

});