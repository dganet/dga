app.controller("inseriCursoCtrl",function($scope, $http,$location , $timeout , $sessionStorage){
  //Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

//*************CADASTRA NOVO USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormCurso) {
  console.log(values);

    // Enviado os valores em objetos para api/user do php/slim
    $http.post('../App/cursofaculdade/save/'+ idUsuario, values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/curso/inseri');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.curso = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

});