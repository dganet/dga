app.controller("bannerCtrl",function($scope,restful,$location , $timeout ){
      //Pega o Token 
  var token = sessionStorage.getItem('usuario.token'); 
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;
  $scope.mensagemLimite = true; 
        
  //Lista todos os Banners
	restful.bannerList().success(function(data){
		$scope.banners = data;       
	}); 

//Novo registro. zera todas informaçoes do objeto
    $scope.novo = function(){
      $scope.banner = {};  
    };
    
// Show modaais de detalhes, alterar e deletar.
$scope.dados = function (id){
  var id = id;
    //Resentando 
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.banner = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();
       //Pega as info da universidade selecionada ja sei mano ...
		restful.bannerListId(id).success(function(data){
		$scope.banner = data[0];	
        });
};
//************* NOVO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormBanner) {
    //incluir o tipo da imagem que é o Banner
    values['tipoImagem'] = 'banner';
    // Enviado os valores em objetos para api/user do php/slim
    restful.bannerSave(values,token).success(function(response){

      // Fecha o Modal
    $('#closeModalPost').modal('hide');
    if ( response.flag == false){
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemLimite = false;
      $timeout(function () {
               $scope.mensagemLimite = true; 
           },10000);
  
    };//go
    //Lista todas Cursos
    restful.bannerList().success(function(data){
		$scope.banners = data;       
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
      $scope.banner = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

  };

//************* UPDATE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, FormBanner) {
    console.log(values); //testa plis tira dessa porra da tela de trabalho 
    // Enviado os valores em objetos para api/user do php/slim
    restful.bannerPut(values,token).success(function(){
     // Fecha o Modal
      $('#closeModalUpdate').modal('hide');

        //Lista todas Cursos
        restful.bannerList().success(function(data){
            $scope.banners = data;       
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
    restful.bannerDel(values,token).success(function(){
    // Fecha o Modal
      $('#closeModalDel').modal('hide');
        
     //Lista todas Cursos
        restful.bannerList().success(function(data){
            $scope.banners = data;       
        });
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDelete = false;
      $timeout(function () {
               $scope.mensagemDelete = true;
           },10000);

    });
  };
    
});