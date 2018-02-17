app.controller('corretorCtrl', function($scope,restful,$location){
	//pega a url depois de imobiliar.net.br"/qualquercoisa"
    var url  = $location.url(); 
	//Remove a "/" deixando apenas qualquercoisa
	var url = url.replace("/","");
	// GET para Listar os Dados do Corretor
	restful.corretorListDados(url).success(function(response){
		$scope.corretor = response;
	});
	// GET para o Back Lista os Imoveis do Corretor
	restful.corretorListImovel(url).success(function(response){
		console.log(response);
		$scope.corretorListImovel = response;
	});
});