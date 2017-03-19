app.controller("updateCtrl", function($scope, $http, $timeout , $location,  $sessionStorage){
//Pega o Id do Usuario Logado
var idUsuario = sessionStorage.getItem('usuario.id');

	//esconde mensagem
	$scope.mensagem = true;
console.log(idUsuario);
$scope.update = function(values){
        $http.put('../App/Caminho/' + idUsuario).success(function(data){
            
                // Funcão de exibir a mensagem de sucesso em 5 segundos.
                $scope.mensagem = false;
                $timeout(function () {
                        $scope.mensagem = true;
                    },10000);

            });
};

 
});