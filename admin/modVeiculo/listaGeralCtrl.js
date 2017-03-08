app.controller("listaGeralCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  //Pega o Id do Usuario Logado
  var idUsuario = sessionStorage.getItem('usuario.id');
  //Lista todos Veiculos
  $http.get('../App/Associado/listageral').success(function(data){
    $scope.veiculos = data;

  });

  //Lista todos Associado vinculado neste veiculo
  $scope.preAssociados = function(value){
    $scope.seis = true;
    $scope.sete = false;


  };

    //Lista todos Associado vinculado neste veiculo
  $scope.listaEspera = function(value){
    $scope.seis = false;
    $scope.sete = true;

  };

});
