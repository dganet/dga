 app.controller("painelCtrl", function($scope, $http, $timeout , $location){
    //Mostra o Link Nova Conta
    $scope.newcount = true;
    $scope.login = true;
    //Oculta o Link Nova Conta e Mostra o Form de Autenticação
    $scope.loginAction = function (){
        $scope.autentication = true; 
        $scope.newcount = true;
        $scope.login = false;
    };
    /*
    //Check Senha
    $scope.senhaOriginal
    $scope.checkSenha = function(dados){
    var senhaConfirma = dados;
        if (senha == senhaConfirma){
            console.log('chupa gui');
        }
    };
  */
//*************CADASTRA NOVO USUARIO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, formUsuario) {
      console.log(values);
    // Enviado os valores em objetos para api/user do php/slim
   $http.post('App/usuario/save', values).success(function(){


      });
  };
 });