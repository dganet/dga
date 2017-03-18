app.controller("alteraBannerCtrl", function($scope, $http,$location , $timeout, $sessionStorage ){
//Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');
$scope.mensagem = true;
$scope.banner = [
    {
    um:'1',
    dois:'2',
    tres:'3'
    }];

$scope.update = function(values){
    console.log(values);
};


});
