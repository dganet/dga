 app.controller("perfilCtrl", function($scope,serviceEnderecos, $timeout , $location, restful){

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
      // Oculta a mensagem da Senha
      $scope.mensagemSenha = true;
      // Oculta a mensagem da Senha
      $scope.mensagemSenhaSucesso = true;

  //Função que altera os formularios
  $scope.click = function(dados){
  if (dados == 'updateFotos'){
  $scope.formFoto = 'ativo';
  $scope.formDados = 'inativo';
  $scope.formSenha = 'inativo';
  };
  if (dados == 'updateDados'){
  $scope.formDados = 'ativo';
  $scope.formFoto = 'inativo';
  $scope.formSenha = 'inativo';
  };
  if (dados == 'updateSenha'){
  $scope.formSenha = 'ativo';
  $scope.formDados = 'inativo';
  $scope.formFoto = 'inativo';

  };

  };

  //FUNÇÃO QUE CARREGA OS ENDERÇOS
              // Load Estados
            serviceEnderecos.getEstados().success(function (response){
            $scope.estados = response;
            });

            $scope.selectBairro = true;

            // Load Cidades referente ao Estado
            $scope.executeCidade = function (id){
                    serviceEnderecos.getCidadesEstado(id).success(function(response){
                    $scope.cidades = response;
                $scope.selectBairro = true;
                $scope.btnBairroBack = false;
                $scope.inputBairro = false;
                });
            };


             // Load Bairros referente a Cidade
            $scope.executeBairro = function (id){
                var idCidade = id;
                 serviceEnderecos.getBairros(id).success(function(response){
                     var flag = response.flag;
                     if (flag == false ){
                         $scope.inputBairro = true;
                         $scope.selectBairro = false;
                         $scope.btnBairroBack = true;
                         $scope.btnNewBairro = false;
                         //Salva um novo Bairro
                         $scope.bairro = function(values){
                            values['cidadeId'] = idCidade;
                            $http.post('App/bairro/save', values).success(function(response){
                            });
                         }
                     }else {
                     $scope.bairros = response;
                     $scope.btnNewBairro = true;
                     };
                 });

            };


               $scope.newBairro = function(){
                $scope.selectBairro = false;
                $scope.btnNewBairro = false;
                $scope.btnBairroBack = true;
                $scope.inputBairro = true;
               };

                $scope.backBairro = function(){
                $scope.selectBairro = true;
                $scope.btnNewBairro = true;
                $scope.btnBairroBack = false;
                $scope.inputBairro = false;
               };
  

//END ENDEREÇO

         //FUNÇÃO QUE PRINTA OS ALERTAS CONFORME AS ESPECIFICAÇÕES
        $scope.verificaFoto = function(element){
       $scope.$apply(function(scope) {
      // Turn the FileList object into an Array
        var elementosFoto = $scope.files = []
        for (var i = 0; i < element.files.length; i++) {
          $scope.files.push(element.files[i])
        }

               //Pega o tamano da foto   
              $tamanhoFoto = elementosFoto[0]['size'];
              // Pega extensão da Imagem
              $extensaoFoto = elementosFoto[0]['type'];
              //Pega nome da Foto
              $nomeFoto = elementosFoto[0]['name'];
              // Valida se é menor que 2MB e se é diferente de jpeg e jpg  
              if ($tamanhoFoto > 2000000 || $extensaoFoto != 'image/jpeg' && 'image/jpg'){
                alert('Foto com extensão ou tamanho inválido - > ' + $nomeFoto);
              
              }

      });
    };


    $scope.fotoPerfil = function(fotos){
      angular.forEach(fotos, function(value,key){
         // Valida se é menor que 2MB e se é diferente de jpeg e jpg  
        if(value.size < 2000000 && value.type == 'image/jpeg' && 'image/jpg'){
            this.push(value);
   
          $scope.formImagens = false;
          $scope.formIsPublic = 'ativo';
          $scope.progresso = 99;
     

               
        }else{
             alert('Imagens Invalidas - > ' + value.name);}
             ;
  
      },emptyFotos);
    };


      //Serviço que altera a foto do Perfil
    $scope.fotoPerfil = function (fotos){
        
        var picture = [];

        angular.forEach(fotos, function(value,key){
         // Valida se é menor que 2MB e se é diferente de jpeg e jpg  
        if(value.size < 2000000 && value.type == 'image/jpeg' && 'image/jpg'){
                this.push(value); 

            // Manda a foto para o Back End
                restful.updatePicture(picture, token).success(function(response){
             // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagemSucesso = true;
                $timeout(function () {
                        $scope.mensagemSucesso = false;
                    },10000);
        });


        }else{

             alert('Imagens Invalidas - > ' + value.name);
              }             ;
  
      },picture);

    }

//Update Dados Pessoais
$scope.update = function(pessoal){

  restful.updatePessoa(pessoal, token).success(function(){
     // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagemSucesso = true;
                $timeout(function () {
                        $scope.mensagemSucesso = false;
                    },10000);

  });

};

      // Update da Senha 
      $scope.updateSenha = function(dados){
        
        if (dados.um === dados.dois){
          var senha = dados.um;
         // Envia para o Back End os valores
          restful.updateSenha(senha, token).success(function(response){

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



 });//END do controller}

