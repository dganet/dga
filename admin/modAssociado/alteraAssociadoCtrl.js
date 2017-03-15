app.controller("alteraAssociadoCtrl", function($scope, $http,$location , $timeout, $sessionStorage){
//Pega o Id do Usuario Logado
var id = sessionStorage.getItem('usuario.id');
if(id == null){$location.path('/login')};

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

  //Pegando as linhas
  $http.get('../App/veiculo/list').success(function(data){
  	$scope.veiculos = data;

  });

//Lista os Usuarios
	$http.get('../App/associado/list').success(function(data){
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
	  console.log(values.nome);
		var associado = values;
		var associado = angular.merge(associado,renda);
	    if (values.nome == '' || values.cpf == '' || values.salario == '' || values.veiculo_id == ''){
		    
			$scope.mensagemObrigatorio = true;
			    $timeout(function () {
               $scope.mensagemObrigatorio = false;
           },5000);
	

			
		}else{
    // Enviado os valores em objetos para api/user do php/slim
	 $http.put('../App/associado/update/'+ id , associado).success(function(response){

      // Depois mandando para mesma pagina
    	 $scope.activePath = $location.path('/user/associado/altera');

      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagem = false;
      $timeout(function () {
               $scope.mensagem = true;
           },10000);

	    $http.get('../App/associado/list').success(function(data){
		$scope.associados = data;
		});

	    $scope.quatro = false;
   });
		}

	};

//*************DELETE ASSOCIADO *********************//

//Passa os valores do form em Objeto no "values"
  $scope.deleta = function(values) {

    // Enviado os valores em objetos para api/user do php/slim
    $http.delete('../App/associado/delete/'+ values).success(function(){
      // Depois mandando para mesma pagina
      $scope.activePath = $location.path('/user/associado/altera');


      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDeleta = false;
      $timeout(function () {
               $scope.mensagemDeleta = true;
           },10000);

    $http.get('../App/associado/list').success(function(data){
    $scope.associados = data;
	});

	 $scope.quatro = false;

    });


  };

});
