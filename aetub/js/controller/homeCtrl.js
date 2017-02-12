app.controller('homeCtrl', function($scope , $location){

	$scope.logando = function (values, formAut){
	
   		$scope.activePath = $location.path('/associado');

	};

});