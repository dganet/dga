app.controller("inseriVagaCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  //Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');

$scope.quatro = false;

//Lista os Usuarios
  $http.get('../App/associado/listaguardando').success(function(data){
    $scope.associados = data;

  });

// Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){

  $scope.quatro = true;
  var id = $scope.id = values;


    $http.get('../App/associado/list/'+ id).success(function(data){
    $scope.objeto = data[0];

     });

// Seleciona as vagas 

  $http.get('../App/periodo/list').success(function(data){
  $scope.periodos = [data[0]];
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

  var idAssociado = values.id;
  var idPeriodo = values.linha.id;
  var array  = {associado_id : idAssociado , periodo_id : idPeriodo};

    // Enviado os valores em objetos para api/user do php/slim
     $http.post('../App/vaga/save/' + idUsuario, array).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/vagas/inseri');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);
    });

    $scope.quatro = false;

  };

});