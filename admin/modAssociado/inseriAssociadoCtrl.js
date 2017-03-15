app.controller("inseriAssociadoCtrl",function($scope, $http,$location , $timeout , $sessionStorage){

//Pega o Id do Usuario Logado
var id = sessionStorage.getItem('usuario.id');

$scope.tabs = "true";
$scope.tab1 = true;

$scope.go = function (dados){

	if (dados == 'tab1'){
		$scope.tab1 = true;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}

	if (dados == 'tab2'){
		$scope.tab1 = false;
		$scope.tab2 = true;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;


	}

	if (dados == 'tab3'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = true;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab4'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = true;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab5'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = true;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab6'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = true;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab7'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = true;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab8'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = true;
		$scope.tab9 = false;
		$scope.tab10 = false;

	}


	if (dados == 'tab9'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = true;
		$scope.tab10 = false;

	}


	if (dados == 'tab10'){
		$scope.tab1 = false;
		$scope.tab2 = false;
		$scope.tab3 = false;
		$scope.tab4 = false;
		$scope.tab5 = false;
		$scope.tab6 = false;
		$scope.tab7 = false;
		$scope.tab8 = false;
		$scope.tab9 = false;
		$scope.tab10 = true;

	}

	}



  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
  $scope.mensagemObrigatorio = false;

$scope.associado = {
	salario: '0,00',
	cep: '11250-000',
	cidade: 'Bertioga'
}
$scope.civil = function (dados) {
	if (dados == 'casado'){
	$scope.campoConjuge = true;
	} 
	if (dados == 'solteiro' || dados == ''){
	$scope.campoConjuge = false;
	} 

};
$scope.plano = function (dados) {
	if (dados == 'simPlano'){
	$scope.campoQualPlano = true;
	} 
	if (dados == 'naoPlano' || dados == ''){
	$scope.campoQualPlano = false;
	} 
};
$scope.problema = function (dados) {
	if (dados == 'simProblema'){
	$scope.campoProblema = true;
	} 
	if (dados == 'naoProblema' || dados == ''){
	$scope.campoProblema = false;
	} 
};

$scope.bolsa = function (dados) {
	if (dados == 'simBolsa'){
	$scope.campoBolsa = true;
	} 
	if (dados == 'naoBolsa' || dados == ''){
	$scope.campoBolsa = false;
	} 
};
$scope.curso = function (dados) {
	if (dados == 'simCurso'){
	$scope.campoCurso = true;
	} 
	if (dados == 'naoCurso' || dados == ''){
	$scope.campoCurso = false;
	} 
};
$scope.desistiu = function (dados) {
	if (dados == 'simDesistiu'){
	$scope.campoDesistiu = true;
	} 
	if (dados == 'naoDesistiu' || dados == ''){
	$scope.campoDesistiu = false;
	} 
};

  //Pegando as linhas
  $http.get('../App/veiculo/list').success(function(data){
  	$scope.veiculos = data;

  });


var dados = $scope.renda = [];
var renda = {renda:dados};

$scope.addInput = function(){
	var newInputs = $scope.renda.lenght+1;
	$scope.renda.push({nomeParentesco:'',grauParentesco:'',rendaParentesco:''});
};

$scope.removeInput = function() {
	 var lastItem = $scope.renda.length-1;
	 $scope.renda.splice(lastItem);
 };
//*************CADASTRA NOVO CLIENTE *********************//

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormAssociado) {
		var associado = values;
		var associado = angular.merge(associado,renda);
	    if (values.nome == undefined || values.cpf == undefined || values.salario == undefined || values.veiculo_id == undefined){

			$scope.mensagemObrigatorio = true;
			    $timeout(function () {
               $scope.mensagemObrigatorio = false;
           },10000);
	

			
		}else{
    // Enviado os valores em objetos para api/user do php/slim 
		$http.post('../App/associado/save/'+ id, associado).success(function(){


      // Depois mandando para mesma pagina
      $scope.activePath = $location.path('/user/associado/inseri');

      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },20000);

    //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master
      $scope.associado = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();

    });
   };
  };

});
