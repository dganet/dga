app.factory("serviceEnderecos", function($http, $stateParams){
/*
Estado:
GET /App/estado/pais/{id} -> retorna todos os estados de um pais (ID)

Cidades:
GET /App/cidade/estado/{id} -> retorna todas as cidades de um estado (ID)

Bairro:
GET /App/bairro/cidade/{id} -> retorna todos os bairros de uma cidade (ID)
*/




/*
Pais :
GET App/pais -> retorna todos os paises cadastrados
   EX : [{"id":"1","nome":"Brasil","sigla":"BR"}]
GET App/pais/{id} -> retorna toda a informação referente ao ID do pais
 -------------------------------------------------------------------------------------------------------------
Estado:
GET App/estado -> retorna todos os estados cadastrados
   EX:  [{"id":"1","nome":"Acre","uf":"AC","pais":"1"},{"id":"2","nome":"Alagoas","uf":"AL","pais":"1"}]
GET App/estado/{id} -> retorna toda a informação referente ao id do estado
   EX : {"id":"2","nome":"Alagoas","uf":"AL","pais":{"id":"1","nome":"Brasil","sigla":"BR"}}
-------------------------------------------------------------------------------------------------------------
Cidade:
GET App/cidade -> retorna todas as cidades cadastradas
   EX : [{"id":"1","nome":"Afonso Cl\u00e1udio","estado":"8"},{"id":"2","nome":"\u00c1gua Doce do Norte","estado":"8"}]
GET App/cidade/{id} -> retorna toda a informação referente ao id da cidade
   EX : {"id":"1","nome":"Afonso Cl\u00e1udio","estado":{"id":"8","nome":"Esp\u00edrito Santo","uf":"ES","pais":{"id":"1","nome":"Brasil","sigla":"BR"}}}
-------------------------------------------------------------------------------------------------------------
Bairro:
GET App/bairro -> retorna todos os bairros cadastrados
   EX : [{"id":"1","nome":"0","cidade":"4777"}]
GET App/bairro/{id} -> retorna todas as informações referente ao id do bairro
   EX : {"id":"1","nome":"0","cidade":{"id":"4777","nome":"Bertioga","estado":{"id":"26","nome":"S\u00e3o Paulo","uf":"SP","pais":{"id":"1","nome":"Brasil","sigla":"BR"}}}}
POST App/bairro/save -> salva um novo bairro

*/
 	 	var _getEstados = function () {
 		return  $http.get('App/estado');
 	};

 	 	var _getCidades = function (id) {
 		return $http.get('App/cidade/estado/' + id);
 	
 	};

 	 	var _getCidade = function (id) {
 		return $http.get('App/cidade/' + id);
 	
 	};
 	 	var _getBairros = function (id) {
 		return $http.get('api/bairro/' + id );
 	
 	};

 	 	return {
 		getEstados: _getEstados,
 		getCidade: _getCidade,
 		getCidades: _getCidades,
 		getBairros: _getBairros,
 	};

});