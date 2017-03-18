app.controller("listaGeralCtrl", function($scope, $http,$location , $timeout,$sessionStorage, $filter){
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
    //Lista Associados vinculado a Linha
    $http.get('../App/associado/listveiculo/' + idVeiculo).success(function(data){
      var a = $scope.associados = data;
      console.log(a);
    });
  };

    //Lista todos Associado vinculado neste veiculo
  $scope.listaEspera = function(value){
    $scope.seis = false;
    $scope.sete = true;
    var idVeiculo = value;

    //Lista Associados vinculado a Linha
    $http.get('../App/associado/listaguardando/' + idVeiculo).success(function(data){


    data.forEach(function(element) {
     var dataformat = element['createAt'] =  new Date(element['createAt']);
     var dataformat = element['createAt'] = $filter('date')(dataformat,'MMMM');
     element = dataformat;
       }, this);
      $scope.associadosAguardando = data;    
      $scope.total =  $scope.associadosAguardando.length;    
    });
  };

});
