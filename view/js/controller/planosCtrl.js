app.controller('planosCtrl', function($scope, $http){
	var config = {headers: {
		'Content-Type': 'application/json',
		'Access-Control-Allow-Origin' : '*',
		'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE',
		'X-Requested-With': 'XMLHttpRequest',
		'Access-Control-Allow-Headers' : 'Origin, X-Requested-With, Content-Type, Accept'
	}
};

	//https://ws.pagseguro.uol.com.br/recurring-payment/boletos?email=a@b.com&token=123AB
	https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=adniltonweb@gmail.com&token=C630DC7410554CE5A3EDA90BC6666A68
	var $urlPagSeguro = 'https://ws.pagseguro.uol.com.br/recurring-payment/boletos?email=adniltonweb@gmail.com&token=C630DC7410554CE5A3EDA90BC6666A68';



	
		$http.post($urlPagSeguro, config).success(function(response){
			//Id Transação PagSeguro
			console.log(response);	

		});


	});