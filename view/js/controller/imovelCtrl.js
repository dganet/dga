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

  //Ativando o Select Bairro 
  $scope.selectBairro = true;
  //Ativando loop de imovel Padrao
  $scope.listPadrao = 'ativo';
  //Inputs Imagens
  var contagem = [
      {value:"0", label:"Foto Principal", status:"true"},
      {value:"1", label:"Foto 01",status:"true"},
      {value:"2", label:"Foto 02",status:"true"},
      {value:"3", label:"Foto 03",status:"true"},
      {value:"4", label:"Foto 04",status:"true"},
      {value:"5", label:"Foto 05",status:"true"},
      {value:"6", label:"Foto 06",status:"true"},
      {value:"7", label:"Foto 07",status:"true"},
      {value:"8", label:"Foto 08",status:"true"},
      {value:"9", label:"Foto 09",status:"true"},
      {value:"10", label:"Foto 10",status:"true"},
      {value:"11", label:"Foto 11",status:"true"},

    ];
    $scope.fotoSelect = function(value){
       var a = this.fotoSelecionado = value;
        this.contactCopy = angular.copy(value);
        console.log(a);
    };
  $scope.inputsFotos = contagem;


  // Lista todos Imoveis do Cliente
  restful.imovelList(token).success(function(response){
    response.forEach(function(element) {
        if (element.isPublic == '1'){
            element['isPublic'] = 'Publico';
        }else{
            element['isPublic'] = 'Privado';
        }

          }, this);

      $scope.imovelList = response;
  });


            // Load Estados
            serviceEnderecos.getEstados().success(function (response){
            $scope.estados = response;
            });
            // Load Cidades
            serviceEnderecos.getAllCidades().success(function (response){
            $scope.cidades = response;
            });
            // Load Bairros
            serviceEnderecos.getAllBairros().success(function (response){
            $scope.bairros = response;
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

// FUNCOES DO IMOVEL

  //Operaçoes
  $scope.operacoes =   [
      {"idOperacao":1,"nomeOperacao":'Locacao'},
      {"idOperacao":2,"nomeOperacao":'Venda'}
  ];
  // Tipos
    $scope.tipos = [
        {"idTipo":1,"tipoImovel":'Apartamento'},
        {"idTipo":2,"tipoImovel":'Casa'},
        {"idTipo":3,"tipoImovel":'Terreno'},
       ];

  //Função que Seleciona os tipos
            $scope.selectOperation = function (value){

                if (value == null){
                    $scope.operacao = 'inativo';
                };

                if (value == "Locacao"){
                    $scope.operacao = 'ativo';

                };

                if(value == "Venda"){
                    $scope.operacao = 'ativo';

                };

            };

     $scope.selectTipo = function(value){
        if (value == null){
          $scope.valorImovel = 'inativo';
          $scope.iptuImovel = 'inativo';
          $scope.condominioImovel = 'inativo';
          $scope.idadeConstrucaoImovel = 'inativo';
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
            $scope.idadeConstrucaoImovel = 'ativo';
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
            $scope.idadeConstrucaoImovel = 'ativo';
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
            $scope.idadeConstrucaoImovel = 'inativo';
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

    var peif = [p,e,i,f];


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
            $scope.progresso = 25;
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
                $scope.progresso = 25;
                $scope.formProprietario = 'ativo';
                }

                if (value == 'endereco'){
                $scope.formEndereco = 'ativo';
                $scope.formImovel = 'inativo';
                $scope.progresso = 75;
                }

                if (value == 'imovel'){
                $scope.formImagens = 'inativo';
                $scope.formImovel = 'ativo';
                $scope.progresso = 90;

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
            $scope.progresso = 50;
            $scope.formProprietario = 'inativo';
            $scope.selectBairro = true;
            $scope.btnNewBairro = false;
            $scope.btnBairroBack = false;

            // Ativa o Formulario do Segundo Passo
            $scope.formEndereco = 'ativo';


        };
     //
     //
     // TERCEIRO PASSO
     //
     //
        $scope.segundoPasso = function (endereco){
           //, Coleta dados do Imovel
          emptyEndereco.push(endereco);

            $scope.progresso = 75;

            $scope.formEndereco = false;
            // Ativa o Formulario do Segundo Passo
            $scope.formImovel = 'ativo';



};//END do controller
     //
     //
     // QUARTO PASSO
     //
     //
        $scope.terceiroPasso = function (imovel){
          emptyImovel.push(imovel);
          $scope.progresso = 95;
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

            // Armazena as fotos no -> emptyfotos
            this.push(value);



          //*************CADASTRA NOVO IMOVEL *********************//

          restful.imovelSave(peif).success(function(response){
           
          // Funcão de exibir a mensagem de sucesso em 5 segundos.
          $scope.mensagemSucesso = false;
          $timeout(function () {
                   $scope.mensagemSucesso = true;
               },10000);

           //Resentando os input do formulario .
          $scope.reset = function() {
            $scope.formCPF ='Ativo';
            $scope.formImagens = 'inativo';
          // Copiando os valores vazio do scope.master
            $scope.imovel = angular.copy($scope.master);
            $scope.proprietario = angular.copy($scope.master);
            $scope.endereco = angular.copy($scope.master);
            $scope.fotos = angular.copy($scope.master);
          };
          // Ativando a função
          $scope.reset();

             });

                         // Fecha o Modal
               $('#closeModalPost').modal('hide');


        }else{
             alert('Imagens Invalidas - > ' + value.name);

            }
             ;

      },emptyFotos);
    }


          //*************UPDATE PROPRIETARIO *********************//

          //Lista os dados do proprietario referente ao id
    $scope.modalUpdateProprietario = function(id){
      restful.imovelListiIdProprietario(id,token).success(function(response){
        $scope.proprietario = response;

        $scope.updateProprietario = function(proprietario){

            restful.imovelUpdateProprietario(id,token,proprietario).success(function(response){
                 // Fecha o Modal
                    $('#closeModalUpdateProprietario').modal('hide');
                    // Funcão de exibir a mensagem de sucesso em 5 segundos.
                    $scope.mensagemSucesso = false;
                    $timeout(function () {
                            $scope.mensagemSucesso = true;
                        },10000);
            });
          };

      });
    };
         //atualiza o proprietario




           //*************UPDATE ENDERECO *********************//

    $scope.modalUpdateEndereco = function(fkEndereco){
        restful.imovelListiIdEndereco(fkEndereco, token).success(function(response){

            $scope.endereco = response[0];

            $scope.updateEndereco = function(endereco){
                restful.imovelUpdateEndereco(fkEndereco,token,endereco).success(function(response){
                     // Fecha o Modal
                        $('#closeModalUpdateEndereco').modal('hide');
                        // Funcão de exibir a mensagem de sucesso em 5 segundos.
                        $scope.mensagemSucesso = false;
                        $timeout(function () {
                                $scope.mensagemSucesso = true;
                            },10000);
                });
              };

          });
    };

          //*************UPDATE IMOVEL *********************//

    $scope.modalUpdateImovel = function(id){
        restful.imovelListiIdImovel(id,token).success(function(response){
            $scope.operacao = 'ativo';
            
            response.forEach(function(element){
                element['copaImovel'] = parseInt(element['copaImovel']);
                element['andarImovel'] = parseInt(element['andarImovel']);
                element['garagemCobertaImovel'] = parseInt(element['garagemCobertaImovel']);
                element['garagemDescobertaImovel'] = parseInt(element['garagemDescobertaImovel']);
                element['areaTerrenoImovel'] = parseInt(element['areaTerrenoImovel']);
                element['areaUtilImovel'] = parseInt(element['areaUtilImovel']);
                element['areaTotalImovel'] = parseInt(element['areaTotalImovel']);
                element['idadeConstrucaoImovel'] = parseInt(element['idadeConstrucaoImovel']);
                element['banheiroImovel'] = parseInt(element['banheiroImovel']);
                element['saladejantarImovel'] = parseInt(element['saladejantarImovel']);
                element['suiteImovel'] = parseInt(element['suiteImovel']);     
            }, this );
            // Passa a variavel para o Imovel 
            var imovel = $scope.imovel = response[0];
            
            if(imovel.tipoImovel == "Apartamento"){
                //Ativar todos os Inputs
                $scope.valorImovel = 'ativo';
                $scope.iptuImovel = 'ativo';
                $scope.condominioImovel = 'ativo';
                $scope.idadeConstrucaoImovel = 'ativo';
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
            if(imovel.tipoImovel == "Casa"){
                //Ativar todos os Inputs
                $scope.valorImovel = 'ativo';
                $scope.iptuImovel = 'ativo';
                $scope.condominioImovel = 'ativo';
                $scope.idadeConstrucaoImovel = 'ativo';
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
    
            if(imovel.tipoImovel == "Terreno"){
                //Ativar todos os Inputs
                $scope.valorImovel = 'inativo';
                $scope.iptuImovel = 'inativo';
                $scope.condominioImovel = 'inativo';
                $scope.idadeConstrucaoImovel = 'inativo';
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

            $scope.updateImovel = function(imovel){
                restful.imovelUpdateImovel(id,token,imovel).success(function(response){
                     // Fecha o Modal
                        $('#closeModalUpdateImovel').modal('hide');
                        // Funcão de exibir a mensagem de sucesso em 5 segundos.
                        $scope.mensagemSucesso = false;
                        $timeout(function () {
                                $scope.mensagemSucesso = true;
                            },10000);
                });
              };

          });
    };

          //*************UPDATE PROPRIETARIO *********************//

    $scope.modalUpdateProprietario = function(id){
        restful.imovelListiIdProprietario(id).success(function(response){
            $scope.proprietario = response;

            $scope.updateProprietario = function(fotos){

                restful.imovelUpdateProprietario(id,token,Fotos).success(function(response){
                     // Fecha o Modal
                        $('#closeModalUpdateImagem').modal('hide');
                        // Funcão de exibir a mensagem de sucesso em 5 segundos.
                        $scope.mensagemSucesso = false;
                        $timeout(function () {
                                $scope.mensagemSucesso = true;
                            },10000);
                });
              };

          });
    };

              //*************FOTOS *********************//

              $scope.modalUpdateFotos = function(id){
                restful.imovelListiIdFotos(id,token).success(function(response){
                        var i = -1;
                    response.forEach(function(element) {
                        i++;
                        element['status'] = i;

                          }, this);

                    $scope.foto = response;

                    $scope.updateFotos = function(foto){
                        console.log(foto);
                        restful.imovelUpdateFotos(id,token,foto).success(function(response){
                             // Fecha o Modal
                                $('#closeModalUpdateImagem').modal('hide');
                                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                                $scope.mensagemSucesso = false;
                                $timeout(function () {
                                        $scope.mensagemSucesso = true;
                                    },10000);
                        });
                      };

                  });
            };


              //*************FILTRO *********************//

              $scope.listFiltro = function(filtro){
                restful.imovelFiltro(filtro).success(function(response){
                    //Ativo o loop do filtro dos imoveis
                    $scope.imovelFiltro = 'ativo';
                    //Desativo o loop default do imovel
                    $scope.imovelList = 'inativo';
                    // recebe dados do response
                    $scope.imovelFiltro = response;
                       // Fecha o Modal
                                $('#closeModalfiltro').modal('hide');
                        });
                      };

 });//END do controller
