 app.controller("siteCtrl", function($scope, $http, $timeout , $location, $sessionStorage){
          //Oculata Mensagens
    $scope.mensagemSenha = false;
    $scope.mensagemErroSenha = false;
     //Autentinca o Usuario e loga no sistema
     		    
		    $scope.logando = function (values , formAut){

                    $http.post('App/usuario/login', values).success(function(response){
                        var auth = response.flag;

                    if (auth == false){
                        // Exibi a mensagem  				    
                        $scope.mensagemErroSenha = true;
                        // Depois de 5 segundos some a mensagem
                        $timeout(function () {
                        $scope.mensagemErroSenha = false;
                    },10000);

                    } else {
                    // Se for verdadeiro manda pra Home 
                    $scope.activePath = $location.path('/user');
                    sessionStorage.setItem('usuario.id', response.idUsuario);
                    sessionStorage.setItem('usuario.nome', response.nomeUsuario);
                    sessionStorage.setItem('usuario.sobrenome', response.sobrenomeUsuario);
                    sessionStorage.setItem('usuario.token', response.token);
                }
                

                });
            };


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