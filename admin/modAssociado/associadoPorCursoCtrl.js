app.controller("associadoPorCursoCtrl", function($scope, $http,$location , $timeout, $sessionStorage , $filter){
//Pega o Id do Usuario Logado
var id = sessionStorage.getItem('usuario.id');

$scope.quatro = false;

//Lista os Cursos
	$http.get('../App/cursofaculdade/listplus').success(function(data){
   $scope.cursos = data;
	});

// Seleciona o usuario e mostra do Lado.
$scope.dados = function (values){
var nomeCurso = values.nome; 
$scope.nomeCurso = nomeCurso;
var id = values.id;
$scope.quatro = true;

		$http.get('../App/cursofaculdade/list/'+ id).success(function(data){
		$scope.associados = data;
        $scope.total = $scope.associados.length;
 
	});

	}
    
});