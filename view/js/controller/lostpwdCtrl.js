 app.controller("lostpwdCtrl", function($scope, restful, $timeout){

      // Exibi o form do Resgate
      $scope.formResgate = false;
      // Exibi o form update senha
      $scope.formUpdate = true;
      // Oculta a mensagem de Regate 
      $scope.mensagemResgate = true;
      // Oculta a mensagem da Senha
      $scope.mensagemSenha = true;
      // Oculta a mensagem da Senha
      $scope.mensagemSenhaSucesso = true;
      //Chave de Resgate
      var chave =[];
      //Function que verifica se existe o resgate de senha
      $scope.verifica = function(dados){
            chave.push(dados);

            restful.resgateSenha(dados).success(function(response){

            if(response.flag == true ){
              
                      //Exibi o Form Update Senha 
                      $scope.formUpdate = false;
                      $scope.formResgate = true;
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

          // Cria um Json com a Chave de Resgate e a Senha        
          var values = [{codigo:chave},{senha:dados}];
         
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