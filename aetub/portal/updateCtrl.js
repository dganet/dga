app.controller("updateCtrl", function($scope, $http, $timeout , $location,  $sessionStorage){
//Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');

	//esconde mensagem
	$scope.mensagem = true;

$scope.update = function(values){
        $http.post('App/associado/picture/' + idUsuario, values).success(function(data){
            
                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagem = false;
                $timeout(function () {
                        $scope.mensagem = true;
                    },10000);

            });
};

 
});