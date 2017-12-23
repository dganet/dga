 app.controller("lostpwdCtrl", function($scope, restful, $timeout){

      // Exibi o form do Resgate
      $scope.formResgate = true;
      // Exibi o form update senha
      $scope.formUpdate = false;
      // Oculta a mensagem de Regate 
      $scope.mensagemResgate = true;
      // Oculta a mensagem da Senha
      $scope.mensagemSenha = true;
      // Oculta a mensagem da Senha
      $scope.mensagemSenhaSucesso = true;
      //Armazena o e-mail
      var email = [];
      //Function que verifica se existe o resgate de senha
      $scope.verifica = function(dados){
        
        restful.resgateSenha(dados).success(function(response){

            if(response.flag == true ){
              
                      //Exibi o Form Update Senha 
                      $scope.formUpdateSenha = false;
                      // Armazena o e-mail para utilizar o email no update
                      email.push(response.email); 

                    }else{

                        // Funcão de exibir a mensagem  em 5 segundos.
                        $scope.mensagemResgate = false;
                        $timeout(function () {
                                 $scope.mensagemResgate = true;
                             },5000);
            }; //End if

        }); //End Restful 
      
      }; // End function verifica


      // Update da Senha 
      $scope.updateSenha = function(dados){
        
        if (dados.um === dados.dois){

          // Concatena o e-mail e a senha de da variavel          
          var values = email.concat(dados.um);
         
         // Envia para o Back End os valores
          restful.updateSenha(values).success(function(response){

                  // Funcão de exibir a mensagem  em 5 segundos.
                  $scope.mensagemSenhaSucesso = false;
                  $timeout(function () {
                           $scope.mensagemSenhaSucesso = true;
                       },5000);  
          });

          // Se as senhas não forem a mesma, exibi a mensagem de erro

        } else {
                        // Funcão de exibir a mensagem  em 5 segundos.
                        $scope.mensagemSenha = false;
                        $timeout(function () {
                                 $scope.mensagemSenha = true;
                             },3000);          
        };
      };


 }); // End Controller