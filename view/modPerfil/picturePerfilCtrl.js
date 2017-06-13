app.controller('picturePerfilCtrl', function($scope, $http, $timeout , $location, restful){
    //Oculata Mensagens
    $scope.mensagemSucesso = false;
    //Scope Vazio
    $scope.master = {};

    //Serviço que altera a foto do Perfil
    $scope.fotoPerfil = function (dados){
        restful.updatePicture(dados).success(function(response){
             // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagemSucesso = true;
                $timeout(function () {
                        $scope.mensagemSucesso = false;
                    },10000);
                //Resentando os input do formulario .
                $scope.reset = function() {
                // Copiando os valores vazio do scope.master 
                $scope.picture = angular.copy($scope.master);
                };
                // Ativando a função
                $scope.reset();
        });
    }
});