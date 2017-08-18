app.controller("noticiasCtrl",function($scope, restful ,$timeout,$location , $sessionStorage){
//teste 
  $scope.tinymceModel = 'Initial content';

  $scope.getContent = function() {
    console.log('Editor content:', $scope.tinymceModel);
  };

  $scope.setContent = function() {
    $scope.tinymceModel = 'Time: ' + (new Date());
  };

  $scope.tinymceOptions = {
    plugins: 'link image code',
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
  };


  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;
    
//Novo registro. zera todas informaçoes do objeto
    $scope.novo = function(){
      $scope.noticia = {};  
    };
    
  //Lista todas noticias
	restful.noticiaList().success(function(data){
		$scope.noticias = data;       
	}); 
// Show modaais de detalhes, alterar e deletar.
$scope.dados = function (id){
    //Resentando 
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.noticia = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();
    //Pega as info da universidade selecionada
		restful.noticiaListId(id).success(function(data){
		$scope.noticia = data[0];	
        });
};
//************* NOVO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormNoticia) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.noticiaSave(values).success(function(){
      // Fecha o Modal
      $('#closeModalPost').modal('hide');
    
    //Lista todas noticias
    restful.noticiaList().success(function(data){
		$scope.noticias = data;       
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
      $scope.noticia = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

//*************UPDATE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, FormNoticia) {

    // Enviado os valores em objetos para api/user do php/slim
    restful.noticiaPut(values).success(function(){
     // Fecha o Modal
      $('#closeModalUpdate').modal('hide');

        //Lista todas noticias
        restful.noticiaList().success(function(data){
            $scope.noticias = data;       
        });
       
       // Mensagem
       servmsg.mensagem(sucesso).sucess(function(){});

      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      //$scope.mensagemAtualizado = false;
      //$timeout(function () {
      //         $scope.mensagemAtualizado = true;
      //     },10000);

    });

};

//*************DELETE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.del = function(values) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.noticiaDel(values).success(function(){
    // Fecha o Modal
      $('#closeModalDel').modal('hide');
        
     //Lista todas noticias
        restful.noticiaList().success(function(data){
            $scope.noticias = data;       
        });
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDelete = false;
      $timeout(function () {
               $scope.mensagemDelete = true;
           },10000);

    });
  };
    
});