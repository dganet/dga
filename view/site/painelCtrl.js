 app.controller("painelCtrl", function($scope, $http, $timeout , $location){
     //Oculata Mensagens
    $scope.mensagemSenha = false;
    //Mostra o Link Nova Conta
    $scope.newcount = true;
    $scope.login = true;
    //Oculta o Link Nova Conta e Mostra o Form de Autenticação
    $scope.loginAction = function (){
        $scope.autentication = true; 
        $scope.newcount = true;
        $scope.login = false;
    };
    


//*************CADASTRA NOVO USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, formUsuario) {
      //pega as senhas e verifica
      var senhaUsuario = values.senhaUsuario;
      var senha = values.senha;

      if ( senhaUsuario == senha){
            // Enviado os valores em objetos para api/user do php/slim
            $http.post('App/usuario/save', values).success(function(){
                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagemSucesso = true;
                $timeout(function () {
                        $scope.mensagemSucesso = false;
                    },10000);
                //Resentando os input do formulario .
                $scope.reset = function() {
                // Copiando os valores vazio do scope.master 
                $scope.usuario = angular.copy($scope.master);
                };
                // Ativando a função
                $scope.reset();
             });
      }else{
            // Funcão de exibir a mensagem de sucesso em 5 segundos.
            $scope.mensagemSenha = true;
            $timeout(function () {
                    $scope.mensagemSenha = false;
                },10000);
       };

  };
 });