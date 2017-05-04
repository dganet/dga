
    app.controller("homeCtrl", function($scope, $http, $timeout , $location,  $sessionStorage){

    $scope.mensagem = true;
    //Exibi Todas Noticias e Oculta quando clica em Leia Mais.
    $scope.leiaMais = true;
	 
  				 
    // Enviando requisição via post no methodo Http
		    
		    $scope.logando = function (values , formAut){
		    	
				$http.post('App/associado/login', values).success(function(response){
					
		    	if (response.check == false){
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
			    sessionStorage.setItem('usuario.endereco', response[0].endereco);
			    sessionStorage.setItem('usuario.bairro', response[0].bairro);
			    sessionStorage.setItem('usuario.cidade', response[0].cidade);
			    sessionStorage.setItem('usuario.cep', response[0].cep);

  				 
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

//Lista todas as noticias
$http.get('App/post/list').success(function(data){
	$scope.posts = data;
});

//Pega as linhas teste
  $http.get('App/periodo/list').success(function(data){
  $scope.linhas = data;

});

//Lista todas as noticias
$http.get('App/associado/listadeespera').success(function(data){
	$scope.associados = data;
});

//Pega a foto do Banner 1
        $http.get('App/imagem/list').success(function(data){
				  $scope.banner1 = data[0];    
        });

//Pega a foto do Banner 2
        $http.get('App/imagem/list').success(function(data){
                 $scope.banner2 = data[1];      
        });

//Pega a foto do Banner 3
        $http.get('App/imagem/list').success(function(data){
                  $scope.banner3 = data[2];      
        });
});