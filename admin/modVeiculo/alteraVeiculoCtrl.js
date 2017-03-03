app.controller("alteraVeiculoCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  //Pega o Id do Usuario Logado
  var idUsuario = sessionStorage.getItem('usuario.id');

  //Oculta lado Direito
  $scope.quatro = false;
  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
    //Ocultando o Alert Mensagem .
  $scope.mensagemDeleta = true;


  //Lista todos Veiculos
  $http.get('../App/veiculo/list').success(function(data){
    $scope.veiculos = data;
  });

  // Seleciona o veiculo e mostra do Lado. 
  $scope.dados = function (values){
    //Mostra lado direito
    $scope.quatro = true;
    var id = $scope.id = values;

    $http.get('../App/veiculo/list/'+ id).success(function(data){
      $scope.veiculo = data[0];
    });
  }

/************* ATUALIZA OS VEICULOS  *********************/

//Passa os valores do form em Objeto no "values"
  $scope.update = function(values, FormVeiculo) {
      
      // Enviado os valores em objetos para api/user do php/slim
      $http.put('../App/veiculo/update/'+ idUsuario, id, values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/veiculo/altera');         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
 


      //Lista todos Veiculos
      $http.get('../App/veiculo/list').success(function(data){
        $scope.veiculos = data;
      });
    
    });

  };

/************* INATIVA OS VEICULOS  *********************/

//Passa os valores do form em Objeto no "values"
  $scope.deleta = function(values) {

    // Enviado os valores em objetos para api/user do php/slim
    $http.delete('../App/veiculo/delete/'+ values).success(function(){
        // Depois mandando para mesma pagina  
        $scope.activePath = $location.path('/user/veiculo/altera'); 
       
        // Funcão de exibir a mensagem de sucesso em 5 segundos.
          $scope.mensagemDeleta = false;
          $timeout(function () {
                   $scope.mensagemDeleta = true;
               },10000);
        //Oculata lado Direito
         $scope.quatro = false;


        $http.get('../App/veiculos/list').success(function(data){
          $scope.veiculos = data;
        });

    });


  };

});