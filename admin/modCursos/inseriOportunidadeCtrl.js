app.controller("inseriOportunidadeCtrl",function($scope, $http,$location , $timeout , $sessionStorage){
  //Pega o Id do Usuario Logado
var id = sessionStorage.getItem('usuario.id');

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

//*************CADASTRA NOVO USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormNoticia) {


    // Enviado os valores em objetos para api/user do php/slim
    $http.post('../App/oportunidade/save/'+ id , values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/oportunidade/inseri');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.oportunidade = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

});