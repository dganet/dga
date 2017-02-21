app.controller("updateCtrl", function($scope, $http, $timeout , $location,  $sessionStorage){
	//esconde mensagem
	$scope.mensagem = true;

	$http.get('App/associado/list').success(function(response){
		$scope.associado = response[0];
		console.log(response);

	}); 	
 
});