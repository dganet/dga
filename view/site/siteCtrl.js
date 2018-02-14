 app.controller("siteCtrl", function($scope, $timeout , $location, $sessionStorage, restful, serviceEnderecos){
    //Oculata Mensagens
    $scope.mensagemSenha = false;
    $scope.mensagemErroSenha = false;
    $scope.mensagemErroEmail = false;
    $scope.mensagemSucessoEmail = false;


      //Envio de Solicitação de Senha
      $scope.solicitaRecSenha = function(values){
        restful.solicitaResgateSenha(values).success(function(response){
          console.log(response);
          if (response.flag == false){
              // Exibi a mensagem             
              $scope.mensagemErroEmail = true;
              // Depois de 5 segundos some a mensagem
              $timeout(function () {
              $scope.mensagemErroEmail = false;
               },10000);
          }else{

              // Exibi a mensagem             
              $scope.mensagemSucessoEmail = true;
              // Depois de 5 segundos some a mensagem
              $timeout(function () {
              $scope.mensagemSucessoEmail = false;
               },10000);            
          }
        });
};
    //Endereços Estado / Cidade
    $scope.loadClientes = function() {
        //$loading.start('estados');
        serviceEnderecos.getEstados().success(function (response){
            $scope.estados = response;
            //$loading.finish('estados');
        });

    };
    $scope.loadClientes();

$scope.executeCidade = function (id){

		serviceEnderecos.getCidadesEstado(id).success(function (response){
			$scope.cidades = response;
			
		});

	};

      $scope.formCidade = function(dados){
          // Pega o id da Cidade escolhida
          var idCidade = dados;
          // Pega os dados da Cidade
         serviceEnderecos.getCidade(idCidade).success(function (response){
         $scope.cidades = response;    
         sessionStorage.setItem('cidade.nome', response.nome);
         $scope.activePath = $location.path('/cidade/' + idCidade);                                             

         });
 
      };

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
    FB.login(function(dados) {
    if (dados.authResponse) {
     FB.api('/me', function(response) {
        // Pega o Nome do Facebook Logado   
        $scope.nomeFacebook = response.name;
        //VARIAVEL ID do facebook
        var idFacebook  = dados.authResponse;
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


                    idFacebook = idFacebook.userID;
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
                                            sessionStorage.setItem('usuario.idUsuario', response.idUsuario);
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

     //Autentinca o Usuario e loga no sistema por Login e Senha
     		    
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