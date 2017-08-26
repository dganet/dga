
    app.controller("loginCtrl", function($scope, restful, $timeout , $location){

    $scope.mensagem = true;

 				 
    // Enviando requisição via post no methodo Http 
		    
		    $scope.logando = function (values , formAut){
				restful.usuarioLogin(values).success(function(response){  


		    	if (response.flag == false){ 
		    		// Exibi a mensagem  				    
				    $scope.mensagem = false;
				    // Depois de 5 segundos some a mensagem
			        $timeout(function () {
		               $scope.mensagem = true;
		           },5000);

		      	} else { 

		      	// Se for verdadeiro manda pra Home  
		        sessionStorage.setItem('usuario.token', response.token); // funcao token
			    $scope.activePath = $location.path('/user'); // funcao caminho

		      }
		     

		    });

		};
	

 
});