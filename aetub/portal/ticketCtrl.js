app.controller('ticketCtrl', function($scope, $http,$location , $timeout , $sessionStorage){
  //Pega o Id do Usuario Logado
var id = sessionStorage.getItem('usuario.id');
$scope.idAssoc = "teste";
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;

$scope.tabs = "true";
$scope.tab1 = true;

$scope.go = function (dados){

	if (dados == 'tab1'){
		$scope.tab1 = true;
		$scope.tab2 = false;
		$scope.tab3 = false;
	}

	if (dados == 'tab2'){
		$scope.tab1 = false;
		$scope.tab2 = true;
		$scope.tab3 = false;
	}

	if (dados == 'tab3'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = true;
	}

	}

//Abrindo Novo Ticket
$scope.add = function (values,FormTicket){

        // Enviado os valores em objetos para api/user do php/slim
    $http.post('App/ticket/save/'+ id , values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/portal/ticket');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);

     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.ticket = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

    });

  };

//Listando todos os tickets 
  $http.get('App/ticket/listByAssoc/' + id).success(function(dados){

    //Arryar de Letras referente aos números
    var letra = {1:'a',2:'b',3:'c',4:'d',5:'e',6:'f',7:'g',8:'h',9:'i',0:'j'};
    //Dados do Ticket
    var valores = dados;
    
 
     //Percorre os dados no array
      valores.forEach(function(element){

        //Pega o ID ao Clicar
        var id = element['idTicket'];
        //Separar os número em array , exemplo: se o ID for igual a 1234 , separa o numero em array , ex = [1,2,3,4]
        var id = id.split("");
        //Array em branco esperando receber o novo array codificado
        var codificado = [];
       //Pecorre o Array  VALOR 
        id.forEach(function(element){
        // Pecorre o array letras na posição referente o arrya valor , exemplo:  letras[1], letra[2].
        var letras = letra[element];
        // Adicionar no nova variavel codificado
        codificado.push(letras);  
    }, this);
   
        // Criar um novo Objeto chamado idTicketCodificado
        var letras = element.idTicketCodificado = letra[id];
        element = letras; 

      },this);
      
     $scope.tickets = valores;
});

//Abrindo Mensagens do Ticket
  $scope.showMensagem = function (dados){ 
      var merda = $scope.tickets;

   //loop que da falso.
   merda.forEach(function(element){
     var idTicketCodificado = element.idTicketCodificado + 'teste';
    $scope[idTicketCodificado] = false;
    
   });


 //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.mensagens = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

     var idTicket = dados.idTicket;
      //Pega o id Codifificado
     var idTicketCodificado = dados.idTicketCodificado + 'teste';
    //Mostra a DIV chat das mensagens
    $scope[idTicketCodificado] = true;
    //Pega as mensagens e mostra
     $http.get('App/ticket/listTicketMessage/'+idTicket).success(function(response){
      var dadosMensagem = response;
    
    //Arryar de Letras referente aos números
    var letras = {1:'mensagemAssociado',0:'mensagemAetub'};

    dadosMensagem.forEach(function(element){
      var letra = element.isAssocCodificado = letras[element.isAssoc];
    })
    $scope.mensagens = dadosMensagem;
       
    });
  };

  //Ocultando Mensagens do Ticket
  $scope.hideMensagem = function (dados){
   
    var idTicketCodificado = dados + 'teste';

    $scope[idTicketCodificado] = false;

  };

  //Abrindo Novo Ticket
  $scope.newmensagem = function (values,FormChat){

        var array = [values];
        var idTicket = values.idTicket;

      array.forEach(function(element) {
        var fkTicket = element.fkTicket = element.idTicket;
      }, this);
      // Enviado os valores em objetos para api/user do php/slim 
          // adiciona ao objeto o campo isAssoc e informa que é um associado;
          values.isAssoc = true;

     $http.post('App/ticket/newMessage/'+ id , values).success(function(){

                    //Pega as mensagens e mostra
                $http.get('App/ticket/listTicketMessage/'+idTicket).success(function(response){
                  var dadosMensagem = response;
                
                //Arryar de Letras referente aos números
                var letras = {1:'mensagemAssociado',0:'mensagemAetub'};

                dadosMensagem.forEach(function(element){
                  var letra = element.isAssocCodificado = letras[element.isAssoc];
                })
                $scope.mensagens = dadosMensagem;

                //Resentando os input do formulario .
                $scope.reset = function() {
                // Copiando os valores vazio do scope.master 
                  $scope.mensagemTicketMessage = angular.copy($scope.master);
                };
                // Ativando a função
                $scope.reset();
                  
                });
    });


  };




});