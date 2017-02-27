app.controller("inseriVagaCtrl", function($scope, $http,$location , $timeout ,$rootScope){

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
    $scope.teste = data[0];

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

//*************UPDATE USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormVaga) {
console.log(values.nome);
console.log(values.linha.linha);

  };

});