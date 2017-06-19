 app.controller("imovelCtrl", function($scope, $http, $timeout , $location, $sessionStorage,$kookies){
//Pegando Token
 var token = sessionStorage.getItem('usuario.token');

//Oculta a Mensagem de sucesso
$scope.mensagemSucesso = false;

//Scope Vazio
$scope.master = {};


//*************CADASTRA NOVO CLIENTE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, formProprietario) {
            // Enviado os valores em objetos para api/user do php/slim
            $http.post('App/cliente/save', + token , values).success(function(){
                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagemSucesso = true;
                $timeout(function () {
                        $scope.mensagemSucesso = false;
                    },10000);
                //Resentando os input do formulario .
                $scope.reset = function() {
                // Copiando os valores vazio do scope.master 
                $scope.cliente = angular.copy($scope.master);
                };
                // Ativando a função
                $scope.reset();
             });


  };

//*************CADASTRA IMOVEL *********************// 

    //Mudar o Css do Processo em ativo
    $scope.passo1 = 'background:gray; color:white';
    //Ativar o Form do Check CPF
    $scope.formCPF = 'ativo';

    //Oculta Formulario do Proprietario
    $scope.formProprietario = false;

    //função para verificar cpf
    $scope.checkCPF = function (value){
        // Cria a variavel com o CPF
        var cpf = value;
        //Consula no Back-end se existe o cpf
        $http.get('caminho').success(function(response){
            $scope.formCPF = 'inativo';
            var flag = response.flag;
                //Se não existir
                if (flag == false){
                    //Printa na tela o formulario para cadastar
                    $scope.formProprietario = 'ativo';
                    $scope.proprietario = cpf;
                }else{
                    //Printa na tela com os dados
                    $scope.formProprietario = 'ativo';    
                    $scope.proprietario = response;
                }
        });
    };

        //função de voltar
        $scope.back = function (value){
          if (value == 'cpf'){ $scope.formCPF = 'ativo';$scope.formProprietario = 'inativo';}  
        };

        //Primeiro Passo 
        $scope.primeiroPasso = function(dados){
            //, Coleta dados do proprietario
            $scope.proprietario = dados;
            //Segundo Passo 
                
            $scope.passo1 = {};
            $scope.passo2 = 'background:gray; color:white';
            $scope.formProprietario = 'inativo';
            
            
        };
 });//END do controller