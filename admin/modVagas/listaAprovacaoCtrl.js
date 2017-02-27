app.controller("listaAprovacaoCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  //Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');

$scope.quatro = false;

//Lista os Usuarios
  $http.get('../App/associado/listaprovacao').success(function(data){
    $scope.associados = data;

  });

// Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){

  $scope.quatro = true;
  var id = $scope.id = values;


    $http.get('../App/associado/list/'+ id).success(function(data){
    $scope.objeto = data[0];

     });


  }

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
    //Ocultando o Alert Mensagem .
  $scope.mensagemDeleta = true;

/************* INSERI ASSOCIADO NA FILA DE ESPERA  *********************/

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormVaga) {
    var array = {id : values.id , status : "ATIVO"};

        // Enviado os valores em objetos para api/user do php/slim
     $http.put('../App/associado/update/' + idUsuario, array).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/vaga/aprova');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
    });

    $scope.quatro = false;

    //Lista os Usuarios
    $http.get('../App/associado/listaprovacao').success(function(data){
    $scope.associados = data;

  });


  };

});