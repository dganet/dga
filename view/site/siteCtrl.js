 app.controller("siteCtrl", function($scope, $http, $timeout , $location, $sessionStorage, restful){
    //Oculata Mensagens
    $scope.mensagemSenha = false;
    $scope.mensagemErroSenha = false;

    //Questionário SIM ou NAO da Conta do facebook
    $scope.contaSim = function (){  
        $scope.formMigraFacebook = true; 
        $scope.formContaFacebook = false;  

    }
    $scope.contaNao = function (){  
        $scope.formContaFacebook = true;   
        $scope.formMigraFacebook = false;          
    }

    //CONFIGURAÇÕES PLUGIN FACEBBOK
$scope.FBLogin = function (){
    FB.login(function(response) {
    if (response.authResponse) {
     FB.api('/me', function(response) {
        // Pega o Nome do Facebook Logado   
        $scope.nomeFacebook = response.name;
        //VARIAVEL ID do facebook
        var idFacebook = response.id;
        //Seviço executado
         restful.usuarioLoginFB(idFacebook).success(function(response){
             //Retorno do Back
             var auth = response.flag;
             // IF
             if(auth == false){

                    //Mostra o Form de Migracão ou uma nova conta do Facebook
                    $scope.formContaFB = true;
                    //Oculta o Form de Nova Conta
                    $scope.formConta = true;


                    //Function para Migrar a Conta - POST para Back-End
                    $scope.migrar = function (values){
                            //Adicionar o Elemento no Array
                            values['idFacebook'] = idFacebook;
                            //Funcao uptade
                            restful.usuarioSaveMigraFB(values).success(function(response){
                                    var auth = response.flag;
                                    if (auth == false){
                                        // Exibi a mensagem  				    
                                        $scope.mensagemErroSenha = true;
                                        // Depois de 5 segundos some a mensagem
                                        $timeout(function () {
                                        $scope.mensagemErroSenha = false;
                                         },10000);

                                    }else{
                                        // Exibi a mensagem  				    
                                        $scope.mensagemMigrar = true;
                                        // Depois de 5 segundos some a mensagem
                                        $timeout(function () {
                                            $scope.activePath = $location.path('/user');
                                            sessionStorage.setItem('usuario.id', response.idUsuario);
                                            sessionStorage.setItem('usuario.nome', response.nomeUsuario);
                                            sessionStorage.setItem('usuario.sobrenome', response.sobrenomeUsuario);
                                            sessionStorage.setItem('usuario.token', response.token);
                                         },10000);
       
                                    };
                            });
                     };


                    //*************CADASTRA NOVO USUARIO DADOS FACEBOOK *********************// 

                    //Passa os valores do form em Objeto no "values"
                    $scope.addFB = function(values, formUsuario) {
                        //pega as senhas e verifica
                        var senhaUsuario = values.senhaUsuario;
                        var senha = values.senha;
                        values['idFacebook'] = idFacebook;
                        if ( senhaUsuario == senha){
                                // Enviado os valores em objetos para api/user do php/slim
                                restful.usuarioSave(values).success(function(){
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
                                $scope.mensagemSenha = 'morre';
                                console.log('teste');
                                $timeout(function () {
                                        $scope.mensagemSenha = false;
                                    },10000);
                        };

                    };



             }else{

                    // Se for verdadeiro manda pra Home 
                    $scope.activePath = $location.path('/user');
                    sessionStorage.setItem('usuario.id', response.idUsuario);
                    sessionStorage.setItem('usuario.nome', response.nomeUsuario);
                    sessionStorage.setItem('usuario.sobrenome', response.sobrenomeUsuario);
                    sessionStorage.setItem('usuario.token', response.token);
             };


         });

     });
    } else {
     console.log('User cancelled login or did not fully authorize.');
    }
});
};

     //Autentinca o Usuario e loga no sistema
     		    
		    $scope.logando = function (values , formAut){
                    restful.usuarioLogin(values).success(function(response){

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


//*************CADASTRA NOVO USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, formUsuario) {
      //pega as senhas e verifica
      var senhaUsuario = values.senhaUsuario;
      var senha = values.senha;

      if ( senhaUsuario == senha){
            // Enviado os valores em objetos para api/user do php/slim
            restful.usuarioSave(values).success(function(){
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