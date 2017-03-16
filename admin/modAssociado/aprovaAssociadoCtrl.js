app.controller("aprovaAssociadoCtrl", function($scope, $http,$location , $timeout, $sessionStorage , $filter ){
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

$scope.quatro = false;


    //Lista Associados vinculado a Linha
    $http.get('../App/associado/listaprovacao').success(function(data){
      $scope.associados = data;  
    });
	
    //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
  $scope.mensagemObrigatorio = false;

$scope.associado = {
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
    //Pegando as Cursos
  $http.get('../App/cursofaculdade/list').success(function(data){
  	$scope.cursos = data;

  });
      //Pegando as Universidades
  $http.get('../App/universidade/list').success(function(data){
  	$scope.universidades = data;

  });



// Seleciona o usuario e mostra do Lado.
$scope.dados = function (values){

	$scope.quatro = true;

	var id = $scope.id = values;

		$http.get('../App/associado/list/'+ id).success(function(data){
		$scope.associado = data[0];
	});

	}
//	

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagem = true;
  //Ocultando o Alert Mensagem .
  $scope.mensagemDeleta = true;
  $scope.mensagemObrigatorio = false;
    $scope.associado = {
	salario: '0,00',
}

	//*************NOVO INPUT RENDA *********************//
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

//************* UPDATE ASSOCIADO *********************//

//Passa os valores do form em Objeto no "values"
  $scope.update = function(values, FormAssociado) {
		var associado = values;
		var associado = angular.merge(associado,renda);

	    if (values.nome == undefined || values.cpf == undefined || values.salario == undefined || values.veiculo_id == undefined){
		    
			$scope.mensagemObrigatorio = true;
			    $timeout(function () {
               $scope.mensagemObrigatorio = false;
           },10000);			
		}else{
    // Enviado os valores em objetos para api/user do php/slim
	 $http.put('../App/associado/update/'+ id , associado).success(function(response){

      // Depois mandando para mesma pagina
    	 $scope.activePath = $location.path('/user/associado/aprova');

      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);

	    $http.get('../App/associado/listaprovacao').success(function(data){
		$scope.associados = data;
		});

	    $scope.quatro = false;
   });
		};

	};
//*************ATIVA ASSOCIADO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.aprova = function(values, FormAssociado) {

	 $scope.dados = values;
	 var id = $scope.dados.id;
    // Enviado os valores em objetos para api/user do php/slim
    $http.put('../App/associado/ative/'+ values).success(function(){
      // Depois mandando para mesma pagina  
      $scope.activePath = $location.path('/user/associado/aprova');
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);

    $http.get('../App/associado/listaprovacao').success(function(data){
    $scope.associados = data;
     });

    // Seleciona o usuario e mostra do Lado. 
$scope.dados = function (values){

  $scope.quatro = true;

  var id = $scope.id = values;

    $http.get('../App/associado/list/'+ id).success(function(data){
    $scope.associado = data[0];
    
  });

  }
    $scope.quatro = false;

  });

};


});