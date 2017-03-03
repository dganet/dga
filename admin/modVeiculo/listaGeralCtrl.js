app.controller("listaGeralCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  //Pega o Id do Usuario Logado
  var idUsuario = sessionStorage.getItem('usuario.id');
  //Lista todos Veiculos
  $http.get('../App/veiculo/list').success(function(data){
    $scope.veiculos = data;
  });

  //Lista todos Associado vinculado neste veiculo
  $scope.preAssociados = function(value){
    $scope.seis = true;

  };

});