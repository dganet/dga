
    app.controller("homeCtrl", function($scope, $http, $timeout , $location,  $sessionStorage){

    $scope.mensagem = true;
    //Exibi Todas Noticias e Oculta quando clica em Leia Mais.
    $scope.leiaMais = true;
	 
  				 
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


$scope.voltar = function (){
	$scope.leiaMais = true;
	$scope.Noticia = false;

};

$scope.dados = function (values){
		//Oculta Todas Noticias e exibi apenas uma.
	$scope.leiaMais = false;
	$scope.Noticia = true;

		var id = $scope.id = values;

		$http.get('App/post/list/'+ id).success(function(data){
		$scope.post = data[0];
		
	});

};

$http.get('App/post/list').success(function(data){
	$scope.posts = data;


});
	

 
});