app.factory("serviceEnderecos", function($http, $stateParams){
 	
 	 	var _getEstados = function () {
 		return  $http.get('caminho');
 	};

 	 	var _getCidades = function (id) {
 		return $http.get('caminho' + id);
 	
 	};
 	 	var _getBairros = function (id) {
 		return $http.get('api/bairro/' + id );
 	
 	};

 	 	return {
 		getEstados: _getEstados,
 		getCidades: _getCidades,
 		getBairros: _getBairros,
 	};

});