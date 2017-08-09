app.controller("universidadeCtrl",function($scope, restful,$location , $timeout , $sessionStorage){
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
    
  //Lista todas Universidades
	restful.universidadeList().success(function(data){
        console.log(data);
		$scope.universidades = data;       

	});

// Show modal
$scope.dados = function (id){
		restful.universidadeListId(id).success(function(data){
		$scope.universidade = data[0];	
        });
};
//*************CADASTRA NOVA UNIVERSIDADE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormUniversidade) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.universidadeSave(values).success(function(){
      // Depois mandando para mesma pagina  
      $('bs-example-modal-lg-post').modal('hide');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.universidade = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

//*************UPDATE UNIVERSIDADE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, FormUniversidade) {

	 var id = values.id;

    // Enviado os valores em objetos para api/user do php/slim
    restful.universidadePut(id,values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/universidade');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);

    });

};

//*************DELETE UNIVERSIDADE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.del = function(values) {
      console.log('chupa');

    // Enviado os valores em objetos para api/user do php/slim
    //restful.universidadeDel(values).success(function(){
    // Depois mandando para mesma pagina  
    $scope.activePath = $location.path('/user/universidade');
   
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDeleta = false;
      $timeout(function () {
               $scope.mensagemDeleta = true;
           },10000);

   // });
  };
    
});