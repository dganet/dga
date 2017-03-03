app.controller("inseriVeiculoCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  
  //Pega o Id do Usuario Logado
  var idUsuario = sessionStorage.getItem('usuario.id');

  //Oculta lado Direito
  $scope.quatro = false;

  //scope.master vazio;
  $scope.master = {};

  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
    //Ocultando o Alert Mensagem .
  $scope.mensagemDeleta = true;

  /************* INSERI NOVO VEICULO  *********************/

  //Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormVeiculo) {

      //Enviado os valores em objetos para api/user do php/slim
      $http.post('../App/veiculo/save/' + idUsuario, values).success(function(){
        
          //Oculta lado Direito
          $scope.quatro = false;

          // Depois mandando para mesma pagina  
          $scope.activePath = $location.path('/user/veiculo/inseri');
              
          // Funcão de exibir a mensagem de sucesso em 5 segundos.
          $scope.mensagem = false;

          $timeout(function () {
            $scope.mensagem = true;
          },20000);

          //Resentando os input do formulario .
          $scope.reset = function() {
          // Copiando os valores vazio do scope.master 
          $scope.veiculo = angular.copy($scope.master);
           };
            
          // Ativando a função
          $scope.reset();

       }); 
  };     
      
});