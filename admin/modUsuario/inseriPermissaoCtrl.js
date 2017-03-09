app.controller("inseriPermissaoCtrl",function($scope, $http,$location , $timeout){
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

  //Mostra Menus
  $scope.tab = function(value){
    //Todos Menu são Falsos
    $scope.site = false;
    $scope.portal = false;
    $scope.sistema = false;
    $scope.config = false;

    var x = value;

    if (x == 'site') {
      return $scope.site = true;
    }
    if (x == 'portal') {
      return $scope.portal = true;
    }
    if (x == 'sistema') {
      return $scope.sistema = true;
    }
    if (x == 'config') {
      return $scope.config = true;
    }

  }

//*************CADASTRA NOVO USUARIO *********************//

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormUsuario) {

    // Enviado os valores em objetos para api/user do php/slim
    $http.post('../App/usuario/save', values).success(function(){
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
