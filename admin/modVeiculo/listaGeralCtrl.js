app.controller("listaGeralCtrl", function($scope, $http,$location , $timeout,$sessionStorage){
  //Pega o Id do Usuario Logado
  var idUsuario = sessionStorage.getItem('usuario.id');

  $http.get('..App/veiculo/list').success(function(data){
    $scope.veiculos = data;
  });
  $scope.ocupados = function(){}

});