
    app.controller("loginCtrl", function($scope, restful, $timeout , $location,  $sessionStorage){

    $scope.mensagem = true;
	 
  				 
    // Enviando requisição via post no methodo Http
		    
		    $scope.logando = function (values , formAut){
		    
<<<<<<< HEAD
				restful.usuarioLogin(values).success(function(response){
			 			      
=======
				restful.usuarioLogin(values).success(function(response){						
              	 			    console.log(response);  
>>>>>>> e5208f0d59ee5169ce3292e2349786e3e53f6bef
		    	if (response[0] == false){
		    		// Exibi a mensagem  				    
				    $scope.mensagem = false;
				    // Depois de 5 segundos some a mensagem
			        $timeout(function () {
		               $scope.mensagem = true;
		           },10000);

		      	} else {
		      		
		      	// Se for verdadeiro manda pra Home 
			    $scope.activePath = $location.path('/user');
			    sessionStorage.setItem('usuario.id', response[0].id);
			    sessionStorage.setItem('usuario.nome', response[0].nome);
  				 
		      }
		     

		    });

		};
	

 
});