
    app.controller("loginCtrl", function($scope, $http, $timeout , $location	, $rootScope){

    $scope.mensagem = true;
	 
  				 
    // Enviando requisição via post no methodo Http
		    
		    $scope.logando = function (values , formAut){
		    
			    $http.post('App/usuario/login', values).success(function(response){
			    var login = response.login;
			    console.log(values);
			 
			 
			 			      
		      if (login == false){
		    
				    // Exibi a mensagem  				    
				    $scope.mensagem = false;
				    // Depois de 5 segundos some a mensagem
			        $timeout(function () {
		               $scope.mensagem = true;
		           },5000);

		      } else {

		      	   // Se for verdadeiro manda pra Home 
			      $scope.activePath = $location.path('/user');
			      $rootScope.id = response.id;
			      $rootScope.nome = response.nome;

  				 
		      }
		     

		    });

		};
	

 
});