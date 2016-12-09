app.factory("usuarioAPI", function($http){

	var _getUsuarios = function(values){
		return $http.post('api/login', values);
	};


	return {
		getUsuario : _getUsuarios,
	};

});