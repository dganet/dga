
    app.controller("homeCtrl", function($scope, $http, $timeout , $location	, $rootScope){

    $scope.blocoLogin = true ;
    $scope.mensagem = true;
	 
  				 
    // Enviando requisição via post no methodo Http
		    
		    $scope.logando = function (dados , formAut){
		    	
		    	/* HABILITE PROCESSO DE LOGIN PARA PROJETO

			    $http.post('api/login', dados).success(function(response){
			    var login = response.login;

		     
			      if (login == false){
			    
					    // Exibi a mensagem  				    
					    $scope.mensagem = false;
					    // Depois de 5 segundos some a mensagem
				        $timeout(function () {
			               $scope.mensagem = true;
			           },5000);

			      } else {

			      	  $scope.blocoLogin = false; 
			      	  $scope.blocoHome = true;

			      	   // Se for verdadeiro manda pra Home 
				      $scope.activePath = $location.path('/painel');
				      $rootScope.id = response.idusuario;
				      $rootScope.nome = response.nome;
				      $rootScope.sobrenome = response.sobrenome;
				
	  				 
			      }
		     

		    	});

				*/
			      
		};
	

 
});