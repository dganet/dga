
    app.controller("homeCtrl", function($scope, $http, $timeout , $location,  $sessionStorage){

    $scope.mensagem = true;
	 
  				 
    // Enviando requisição via post no methodo Http
		    
		    $scope.logando = function (values , formAut){
		    	
				$http.post('App/associado/login', values).success(function(response){
		
		    	if (response[0] == false){
		    		// Exibi a mensagem  				    
				    $scope.mensagem = false;
				    // Depois de 5 segundos some a mensagem
			        $timeout(function () {
		               $scope.mensagem = true;
		           },10000);

		      	} else {
		      		
		      	// Se for verdadeiro manda pra Home 
			    $scope.activePath = $location.path('/portal');
			    sessionStorage.setItem('usuario.id', response[0].id);
			    sessionStorage.setItem('usuario.nome', response[0].nome);
  				 
		      }
		     

		    });

		};


$http.get('App/post/list').success(function(data){
	$scope.posts = data;

});
	

 
});