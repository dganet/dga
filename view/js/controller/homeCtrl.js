app.controller('homeCtrl', function($scope , $location, usuarioAPI){

	$scope.logando = function (values, formAut){
	
   		$scope.activePath = $location.path('/associado');

	};

});