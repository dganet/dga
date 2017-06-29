 app.controller("imovelCtrl", function($scope, $http, $timeout , $location, $sessionStorage, serviceEnderecos){
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
            $http.post('App/cliente/save' + token , values).success(function(){
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
    var p = $scope.proprietario = {};

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
        $http.post('App/proprietario/cpf/'+ token, value).success(function(response){
            
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
                if (value == 'cpf'){
                $scope.formCPF = 'ativo';
                $scope.formProprietario = 'inativo';
                }

                if (value == 'proprietario'){
                $scope.formCPF = 'inativo';
                $scope.formEndereco = 'inativo';  
                $scope.passo1 = 'background:gray; color:white'; 
                $scope.passo2 = {};
                $scope.formProprietario = 'ativo';
                }
            };

        //Primeiro Passo 
            $scope.primeiroPasso = function(dados){
            //, Coleta dados do proprietario
           $scope.proprietario.push = dados;
            //Segundo Passo                 
            $scope.passo1 = {};
            $scope.passo2 = 'background:gray; color:white';
            $scope.formProprietario = 'inativo';
            $scope.selectBairro = true;
            $scope.btnNewBairro = false;
            $scope.btnNewBairroBack = false;
            
            // Ativa o Formulario do Segundo Passo     
            $scope.formEndereco = 'ativo';      

            // Load Estados
            serviceEnderecos.getEstados().success(function (response){
            $scope.estados = response;
            });
            // Load Cidades referente ao Estado
            $scope.executeCidade = function (id){
                    serviceEnderecos.getCidadesEstado(id).success(function(response){
                    $scope.cidades = response;
                });
            };

         
             // Load Bairros referente a Cidade
            $scope.executeBairro = function (id){
                 serviceEnderecos.getBairros(id).success(function(response){ 
                     var flag = response.flag;
                     if (flag == false ){
                         $scope.inputBairro = true;
                         $scope.selectBairro = false;
                     }else {       
                     $scope.bairros = response;   
                     $scope.btnNewBairro = true;
                     };
                 });

            };

            $scope.newBairro = function(){
                $scope.inputBairro = true;
                $scope.btnNewBairroBack = true;
                $scope.selectBairro = false;
                $scope.btnNewBairro = false;
            }
            $scope.NewBairroBack = function(){
                $scope.inputBairro = false;
                $scope.btnNewBairroBack = false;
                $scope.selectBairro = true;
                $scope.btnNewBairro = true;
            };
        };     

        $scope.segundoPasso = function (values){
            console.log(p);
            
        };
 });//END do controller