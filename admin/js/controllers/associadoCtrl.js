app.controller("associadoCtrl",function($scope, restful, $location , $timeout , $sessionStorage){
  //função que oculta e mostra as tabs
  $scope.go = function (dados){
    $scope.tabs = dados;
};

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;
    
//Novo registro. zera todas informaçoes do objeto
    $scope.novo = function(){
      $scope.curso = {};  
    };
    
  //Lista todas Associados
	restful.associadoList().success(function(data){
		$scope.associados = data;       
	}); 
  
  //Lista todas Associados
  restful.associadoListPre().success(function(data){
    $scope.associadospre = data;       
  }); 

// Show modaais de detalhes, alterar e deletar.
$scope.dados = function (id){
    //Resentando 
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.associado = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();
        //Pega as info da universidade selecionada
		restful.associadoListId(id).success(function(data){
		$scope.associado = data[0];	
        });
};
//*************CADASTRA NOVO CURSO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormCurso) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.associadoSave(values).success(function(){
      // Fecha o Modal
      $('#closeModalPost').modal('hide');
    
    //Lista todas Associado
    restful.associadoList().success(function(data){
		$scope.cursos = data;       
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
      $scope.associado = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

//*************UPDATE UNIVERSIDADE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, Form) {
	 var id = values.id;

    // Enviado os valores em objetos para api/user do php/slim
    restful.associadoPut(id,values).success(function(){
     // Fecha o Modal
      $('#closeModalUpdate').modal('hide');

        //Lista todas Cursos
        restful.associadoList().success(function(data){
            $scope.cursos = data;       
        });
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemAtualizado = false;
      $timeout(function () {
               $scope.mensagemAtualizado = true;
           },10000);

    });

};

//*************DELETE UNIVERSIDADE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.del = function(values) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.associadoDel(values).success(function(){
    // Fecha o Modal
      $('#closeModalDel').modal('hide');
        
     //Lista todas Associado
        restful.associadoList().success(function(data){
            $scope.cursos = data;       
        });
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDelete = false;
      $timeout(function () {
               $scope.mensagemDelete = true;
           },10000);

    });
  };
    
});