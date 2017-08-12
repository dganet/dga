app.controller("cursoCtrl",function($scope, restful,$location , $timeout , $sessionStorage){
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
    
  //Lista todas Cursos
	restful.cursofaculdadeList().success(function(data){
		$scope.cursos = data;       
	}); 
// Show modaais de detalhes, alterar e deletar.
$scope.dados = function (id){
    //Resentando 
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.curso = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();
        //Pega as info da universidade selecionada
		restful.cursofaculdadeListId(id).success(function(data){
		$scope.curso = data[0];	
        });
};
//************* NOVO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormCurso) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.cursofaculdadeSave(values).success(function(){
      // Fecha o Modal
      $('#closeModalPost').modal('hide');
    
    //Lista todas Cursos
    restful.cursofaculdadeList().success(function(data){
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
      $scope.curso = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

//************* UPDATE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, FormCurso) {
	 var id = values.id;

    // Enviado os valores em objetos para api/user do php/slim
    restful.cursofaculdadePut(id,values).success(function(){
     // Fecha o Modal
      $('#closeModalUpdate').modal('hide');

        //Lista todas Cursos
        restful.cursofaculdadeList().success(function(data){
            $scope.cursos = data;       
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
    restful.cursofaculdadeDel(values).success(function(){
    // Fecha o Modal
      $('#closeModalDel').modal('hide');
        
     //Lista todas Cursos
        restful.cursofaculdadeList().success(function(data){
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