 app.controller("imovelCtrl", function($scope, restful,$timeout , $location, $http, serviceEnderecos){
   //Pega o Token 
  var token = sessionStorage.getItem('usuario.token'); 

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;

  //Boleano
  $scope.boleano = [
    {label:'Sim',b:"1"},{label: 'Não', b:"0"}
  ];

//*************CADASTRA IMOVEL *********************//
    
    //Armazena os dados do Objeto Proprietario
    var emptyProprietario = [];
    // Modelo a Ser Enviado para o Back End, não faz nenhuma importancia no front
    var p = {infoProprietario:emptyProprietario};
   
    //Armazena os dados do Objeto Endereco
    var emptyEndereco = [];
    // Modelo a Ser Enviado para o Back End, não faz nenhuma importancia no front
    var e = {infoEndereco:emptyEndereco};

    //Armazena os dados do Objeto Imovel
    var emptyImovel = [];
    // Modelo a Ser Enviado para o Back End, não faz nenhuma importancia no front
    var i = {infoImovel:emptyImovel};

    //Armazena os dados da Imaggens do Imovel
    var emptyFotos = [];
    var f = {infoImagem:emptyFotos};

    var emptyPrivacidade = [];
    var pr = {infoPrivacidade:emptyPrivacidade};

    var peifpr = [p,e,i,f,pr];


    //Mudar o Css do Processo em ativo
    $scope.progresso = 0;
    //Ativar o Form do Check CPF

    $scope.formCPF = 'ativo';
    //Oculta Formulario do Proprietario
    $scope.formProprietario = false;

    //
    //
    // PRIMEIRO PASSO
    //
    //

    //função para verificar cpf
    $scope.checkCPF = function (value){
        // Cria a variavel com o CPF
        var cpf = value;
        //Consula no Back-end se existe o cpf
        $http.post('App/proprietario/cpf/'+ token, value).success(function(response){

            $scope.formCPF = 'inativo';
            $scope.progresso = 20;
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
                $scope.progresso = 0;
                }

                if (value == 'proprietario'){
                $scope.formCPF = 'inativo';
                $scope.formEndereco = 'inativo';
                $scope.progresso = 20;
                $scope.formProprietario = 'ativo';
                }

                if (value == 'endereco'){
                $scope.formEndereco = 'ativo';
                $scope.formImovel = 'inativo';
                $scope.progresso = 40;
                }

                if (value == 'imovel'){
                $scope.formImagens = 'inativo';
                $scope.formImovel = 'ativo';
                $scope.progresso = 60;

                }
                if (value == 'imagens'){
                  $scope.formIsPublic = 'inativo';
                  $scope.formImagens = 'ativo';
                  $scope.progresso = 80;
                }

            };
        //
        //
        //
        //SEGUNDO PASSO
        //
        //
        //
            $scope.primeiroPasso = function(proprietario){
            //, Coleta dados do proprietario
             emptyProprietario.push(proprietario);

             $scope.inputBairro = false;

            //Segundo Passo
            $scope.progresso = 40;
            $scope.formProprietario = 'inativo';
            $scope.selectBairro = true;
            $scope.btnNewBairro = false;
            $scope.btnBairroBack = false;

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
        };
     //
     //
     // TERCEIRO PASSO
     //
     //
        $scope.segundoPasso = function (endereco){
           //, Coleta dados do Imovel
          emptyEndereco.push(endereco);

            $scope.progresso = 60;

            $scope.formEndereco = false;
            // Ativa o Formulario do Segundo Passo
            $scope.formImovel = 'ativo';

            //Operaçoes
           $scope.operacoes =   [
                {"idOperacao":1,"nomeOperacao":'Locacao'},
                {"idOperacao":2,"nomeOperacao":'Venda'}
            ];

            //Função que Seleciona os tipos
            $scope.selectOperation = function (value){

                if (value == null){
                    $scope.operacao = 'inativo';
                };

                if (value == "Locacao"){
                    $scope.operacao = 'ativo';
                    $scope.tipos = [
                    {"idTipo":1,"tipoImovel":'Apartamento'},
                    {"idTipo":2,"tipoImovel":'Casa'},
                   ];
                };

                if(value == "Venda"){
                    $scope.operacao = 'ativo';
                    $scope.tipos = [
                    {"idTipo":1,"tipoImovel":'Apartamento'},
                    {"idTipo":2,"tipoImovel":'Casa'},
                    {"idTipo":3,"tipoImovel":'Terreno'},
                   ];
                };

            };

     $scope.selectTipo = function(value){
        if (value == null){
          $scope.valorImovel = 'inativo';
          $scope.iptuImovel = 'inativo';
          $scope.condominioImovel = 'inativo';
          $scope.idadeImovel = 'inativo';
          $scope.suiteImovel = 'inativo';
          $scope.copaImovel = 'inativo';
          $scope.banheiroImovel = 'inativo';
          $scope.saladejantarImovel = 'atvo';
          $scope.mobiladoImovel = 'inativo';
          $scope.elevadorImovel = 'inativo';
          $scope.descricaoImovel = 'inativo';
          $scope.garagemCobertaImovel = 'inativo';
          $scope.garagemDescobertaImovel = 'inativo';
          $scope.andarImovel = 'inativo';
          $scope.areaTerrenoImovel = 'inativo';
          $scope.areaUtilImovel = 'inativo';
          $scope.areaTotalImovel = 'inativo';
        };
        if(value == "Apartamento"){
            //Ativar todos os Inputs
            $scope.valorImovel = 'ativo';
            $scope.iptuImovel = 'ativo';
            $scope.condominioImovel = 'ativo';
            $scope.idadeImovel = 'ativo';
            $scope.suiteImovel = 'ativo';
            $scope.copaImovel = 'ativo';
            $scope.banheiroImovel = 'ativo';
            $scope.saladejantarImovel = 'atvo';
            $scope.mobiladoImovel = 'ativo';
            $scope.elevadorImovel = 'ativo';
            $scope.descricaoImovel = 'ativo';
            $scope.garagemCobertaImovel = 'ativo';
            $scope.garagemDescobertaImovel = 'ativo';
            $scope.andarImovel = 'ativo';
            $scope.areaTerrenoImovel = 'inativo';
            $scope.areaUtilImovel = 'inativo';
            $scope.areaTotalImovel = 'inativo';
        };
        if(value == "Casa"){
            //Ativar todos os Inputs
            $scope.valorImovel = 'ativo';
            $scope.iptuImovel = 'ativo';
            $scope.condominioImovel = 'ativo';
            $scope.idadeImovel = 'ativo';
            $scope.suiteImovel = 'ativo';
            $scope.copaImovel = 'ativo';
            $scope.banheiroImovel = 'ativo';
            $scope.saladejantarImovel = 'atvo';
            $scope.mobiladoImovel = 'ativo';
            $scope.elevadorImovel = 'inativo';
            $scope.descricaoImovel = 'ativo';
            $scope.garagemCobertaImovel = 'ativo';
            $scope.garagemDescobertaImovel = 'ativo';
            $scope.andarImovel = 'inativo';
            $scope.areaTerrenoImovel = 'inativo';
            $scope.areaUtilImovel = 'inativo';
            $scope.areaTotalImovel = 'inativo';
        };

        if(value == "Terreno"){
            //Ativar todos os Inputs
            $scope.valorImovel = 'inativo';
            $scope.iptuImovel = 'inativo';
            $scope.condominioImovel = 'inativo';
            $scope.idadeImovel = 'inativo';
            $scope.suiteImovel = 'inativo';
            $scope.copaImovel = 'inativo';
            $scope.banheiroImovel = 'inativo';
            $scope.saladejantarImovel = 'inativo';
            $scope.mobiladoImovel = 'inativo';
            $scope.elevadorImovel ='inativo';
            $scope.descricaoImovel ='ativo';
            $scope.garagemCobertaImovel = 'inativo';
            $scope.garagemDescobertaImovel = 'inativo';
            $scope.andarImovel = 'inativo';
            $scope.areaTerrenoImovel = 'ativo';
            $scope.areaUtilImovel ='ativo';
            $scope.areaTotalImovel ='ativo';
        };
     };
};//END do controller
     //
     //
     // QUARTO PASSO
     //
     //
        $scope.terceiroPasso = function (imovel){
          $scope.progresso = 80;
          $scope.formImovel = false;
          // Ativa o Formulario do Segundo Passo
          $scope.formImagens = 'ativo';
  };

      // MULTIPLOS UPLOAD DE IMAGENS

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

    $scope.quartoPasso = function(fotos){

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
    }

//*************CADASTRA NOVO IMOVEL *********************// 
           $scope.save = function(isPublic){
            //Envia as informacoes para emptyPrivacidade
            emptyPrivacidade.push(isPublic);
            console.log(peifpr);


           };
 });//END do controller
