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
      //Function que verifica se existe o resgate de senha
      $scope.verifica = function(dados){
        restful.resgateSenha(dados).success(function(response){

            if(response.flag == true ){
              
                      //Exibi o Form Update Senha 
                      $scope.formUpdateSenha = false; 

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

          restful.updateSenha(dados.um).success(function(response){

                  // Funcão de exibir a mensagem  em 5 segundos.
                  $scope.mensagemSenhaSucesso = false;
                  $timeout(function () {
                           $scope.mensagemSenhaSucesso = true;
                       },5000);  
          });

                        



        } else {
                        // Funcão de exibir a mensagem  em 5 segundos.
                        $scope.mensagemSenha = false;
                        $timeout(function () {
                                 $scope.mensagemSenha = true;
                             },3000);          
        };
      };


 }); // End Controller