app.factory("serviceEnderecos", function($http, $stateParams){
/*
Estado:
GET /App/estado/pais/{id} -> retorna todos os estados de um pais (ID)

/*
Pais :
GET App/pais -> retorna todos os paises cadastrados
   EX : [{"id":"1","nome":"Brasil","sigla":"BR"}]
GET App/pais/{id} -> retorna toda a informação referente ao ID do pais
 -------------------------------------------------------------------------------------------------------------
GET App/estado/{id} -> retorna toda a informação referente ao id do estado
   EX : {"id":"2","nome":"Alagoas","uf":"AL","pais":{"id":"1","nome":"Brasil","sigla":"BR"}}
-------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------
Bairro:
GET App/bairro -> retorna todos os bairros cadastrados
   EX : [{"id":"1","nome":"0","cidade":"4777"}]
GET App/bairro/{id} -> retorna todas as informações referente ao id do bairro
   EX : {"id":"1","nome":"0","cidade":{"id":"4777","nome":"Bertioga","estado":{"id":"26","nome":"S\u00e3o Paulo","uf":"SP","pais":{"id":"1","nome":"Brasil","sigla":"BR"}}}}
POST App/bairro/save -> salva um novo bairro

*/
		// Load Estados
 	 	var _getEstados = function () {
 		return  $http.get('App/estado');
	 };
	 	// Load Cidades
		 var _getAllCidades = function(){
		 return $http.get('App/cidade');
	};
	 	// Load Cidades referente ao Estado
 	 	var _getCidadesEstado = function (id) {
 		return $http.get('App/cidade/estado/' + id);
 	
 	};
	 	// Load Todas informações referente a uma cidade
 	 	var _getCidade = function (id) {
 		return $http.get('App/cidade/' + id);
 	
 	};
	 	// Load Bairros referente uma Cidade
 	 	var _getBairros = function (id) {
 		return $http.get('App/bairro/cidade/' + id);
	 };
	 	// Load Bairros
			  var _getAllBairros = function(){
				return $http.get('App/bairro');
		   };

 	 	return {
 		getEstados: _getEstados,
		getCidade: _getCidade,
		getAllCidades: _getAllCidades,
 		getCidadesEstado: _getCidadesEstado,
		getBairros: _getBairros,
		getAllBairros : _getAllBairros,
 	};

});