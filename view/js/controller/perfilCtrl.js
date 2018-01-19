 app.controller("perfilCtrl", function($scope, $timeout , $location, restful){

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

  $scope.click = function(dados){
  if (dados == 'changeFoto'){
  $scope.formFoto = 'ativo';
  }

  }

      //Serviço que altera a foto do Perfil
    $scope.fotoPerfil = function (dados){
        restful.updatePicture(dados, token).success(function(response){
             // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagemSucesso = true;
                $timeout(function () {
                        $scope.mensagemSucesso = false;
                    },10000);
                //Resentando os input do formulario .
                $scope.reset = function() {
                // Copiando os valores vazio do scope.master 
                $scope.picture = angular.copy($scope.master);
                };
                // Ativando a função
                $scope.reset();
        });
    }

 });//END do controller}
