app.controller("listaGeralCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  //Pega o Id do Usuario Logado
  var idUsuario = sessionStorage.getItem('usuario.id');
  //Lista todos Veiculos
  $http.get('../App/associado/listageral').success(function(data){
    $scope.veiculos = data;
  });

  //Lista todos Associado vinculado neste veiculo
  $scope.associado = function(value){
    $scope.seis = true;
    $scope.sete = false;
    var idVeiculo = value;
    console.log(idVeiculo);
    //Lista Associados vinculado a Linha
    $http.get('../App/associado/listveiculo/' + idVeiculo).success(function(data){
      $scope.associados = data;
    });
  };

    //Lista todos Associado vinculado neste veiculo
  $scope.listaEspera = function(value){
    $scope.seis = false;
    $scope.sete = true;
    var idVeiculo = value;
    console.log(idVeiculo);
    //Lista Associados vinculado a Linha
    $http.get('../App/associado/listaguardando/' + idVeiculo).success(function(data){
      $scope.associadosAguardando = data;
    });
  };

});
