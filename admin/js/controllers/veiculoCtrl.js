app.controller("veiculoCtrl",function($scope, restful, $location , $timeout ){
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;
    
//Novo registro. zera todas informaçoes do objeto
    $scope.novo = function(){
      $scope.veiculo = {};  
    };


//Função Iputs array Universidade
  var destinos = $scope.destino = [];
  var destino = {destino:destinos};

  $scope.addDestino = function(){
  //Lista todas faculdades
  restful.universidadeList().success(function(data){
    $scope.universidades = data;       
  });

  var newInputs = $scope.destino.lenght+1;
  $scope.destino.push({id:''});
  };

  $scope.removeDestino = function() {
     var lastItem = $scope.destino.length-1;
     $scope.destino.splice(lastItem);
   };
//END Iputs array Universidade
    

    //Lista todas faculdades
  restful.universidadeList().success(function(data){
    $scope.universidades = data;       
  });

  //Lista todas veiculos
	restful.veiculoList().success(function(data){
		$scope.veiculos = data;       
	});

    //Lista todas veiculos Disponiveis
  restful.veiculoListGeral().success(function(data){
    $scope.veiculoDisponiveis = data;       
  }); 

  //Lista espera
  $scope.listaEspera = function(value){
    var idVeiculo = value;

    //Lista Associados vinculado a Linha Aguardando
    restful.veiculoListAssociadoLinhaAguardando(idVeiculo).success(function(data){

    data.forEach(function(element) {
     var dataformat = element['createAt'] =  new Date(element['createAt']);
     var dataformat = element['createAt'] = $filter('date')(dataformat,'MMMM');
     element = dataformat;
       }, this);
    
      $scope.associadosAguardando = data;    
      $scope.total =  $scope.associadosAguardando.length;    
    });
  };

  //Lista todos Associado vinculado neste veiculo
  $scope.associado = function(value){
    $scope.veiculo = value;
    var idVeiculo = value;
    //Lista Associado Ativo vinculado a Linha 
    restful.veiculoListAssociadoLinhaAtivo(idVeiculo).success(function(data){
      $scope.associados = data;
    });
  };


// Show modaais de detalhes, alterar e deletar.
$scope.dados = function (id){ 
   
   //Resentando 
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.veiculo = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();
        //Pega as info da universidade selecionada
		restful.veiculoListId(id).success(function(data){ 
       // Dados do Veiculo 
        $scope.veiculo = data[0];
       //conveerter numVagas em inteiro
        data.forEach(function(element) {
          element['numVagas'] = parseInt(element['numVagas']); 
       
        }, this);
    
         //Função Iputs array Universidade
          var destinos = $scope.destino =  data[0]['destino'];

          var destino = {destino:destinos};
          $scope.addDestino = function(){
          //Lista todas faculdades
          restful.universidadeList().success(function(data){
            $scope.universidades = data;       
          });

          var newInputs = $scope.destino.lenght+1;
          $scope.destino.push({idUniversidade:''});
          };

          $scope.removeDestino = function() {
             var lastItem = $scope.destino.length-1;
             $scope.destino.splice(lastItem);
           };
        //END Iputs array Universidade


        });
        
};


//************* NOVO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormVeiculo) {

    // Concatenar o Objeto destino no formulario.
    values = angular.merge(values,destino);

    // Enviado os valores em objetos para api/user do php/slim
    restful.veiculoSave(values).success(function(){
      // Fecha o Modal
      $('#closeModalPost').modal('hide');
    
    //Lista todas veiculos
    restful.veiculoList().success(function(data){
		$scope.veiculos = data;       
	});
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemSucesso = false;
      $timeout(function () {
               $scope.mensagemSucesso = true;
           },10000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.veiculo = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

//************* UPDATE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, FormVeiculo) {

    // Enviado os valores em objetos para api/user do php/slim
    restful.veiculoPut(values).success(function(){
     // Fecha o Modal
      $('#closeModalUpdate').modal('hide');

        //Lista todas veiculos
        restful.veiculoList().success(function(data){
            $scope.veiculos = data;       
        });
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemAtualizado = false;
      $timeout(function () {
               $scope.mensagemAtualizado = true;
           },10000);

    });

};

//************* DELETE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.del = function(values) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.veiculoDel(values).success(function(){
      // Fecha o Modal
      $('#closeModalDel').modal('hide');
        
     //Lista todas veiculos
        restful.veiculoList().success(function(data){
            $scope.veiculos = data;       
        });
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDelete = false;
      $timeout(function () {
               $scope.mensagemDelete = true;
           },10000);

    });
  };
    
});