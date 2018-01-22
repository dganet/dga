app.controller('planosCtrl', function($scope, $http){
	
	var $urlPagSeguro = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=adniltonweb@gmail.com&token=C630DC7410554CE5A3EDA90BC6666A68';

	//$scope.idTransacaoPagSeguro = []; 

	
		$http.post($urlPagSeguro).success(function(response){
			//Id Transação PagSeguro
			this.idTransacaoPagSeguro = response;	

		});
	});