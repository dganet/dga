app.controller("alteraBannerCtrl", function($scope, $http,$location , $timeout, $sessionStorage){
//Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');
//Oculta a Mensagm de Sucesso
$scope.mensagem = true;

        $http.get('../App/imagem/list').success(function(data){
                  console.log($scope.banner1 = data[0]);      
        });

    //Upload Primeiro Banner 1
    $scope.upload1 = function(values){
        $http.put('../App/imagem/save', values).success(function(data){
             // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagem = false;
                $timeout(function () {
                        $scope.mensagem = true;
                    },10000);

            });
    };

    //Upload Primeiro Banner 2
    $scope.upload2= function(values){
        $http.put('../App/imagem/save', values).success(function(data){
            
                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagem = false;
                $timeout(function () {
                        $scope.mensagem = true;
                    },10000);

            });
    };

    //Upload Primeiro Banner 3
    $scope.upload3 = function(values){
        $http.put('../App/imagem/save', values).success(function(data){
            
                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagem = false;
                $timeout(function () {
                        $scope.mensagem = true;
                    },10000);

            });
    };







});
