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
	cep: '11250-000',
	cidade: 'Bertioga',
}
$scope.boleano = [
	{label:'Sim',b:"1"},{label: 'Não', b:"0"}
];
$scope.bosta = [
	{id:'1',label:"Solteiro(a)"},
	{id:'2',label:"Casado(a)"}
];

$scope.duracaoDeCurso = [
	{value:'1º ano 1 semestre',label:"1º ano 1 semestre"},
	{value:'1º ano 2 semestre',label:"1º ano 2 semestre"},
	{value:'2º ano 3 semestre',label:"2º ano 3 semestre"},
	{value:'2º ano 4 semestre',label:"2º ano 4 semestre"},
	{value:'3º ano 5 semestre',label:"3º ano 5 semestre"},
	{value:'3º ano 6 semestre',label:"3º ano 6 semestre"},
	{value:'4º ano 7 semestre',label:"4º ano 7 semestre"},
	{value:'4º ano 8 semestre',label:"4º ano 8 semestre"},
	{value:'5º ano 9 semestre',label:"5º ano 9 semestre"},
	{value:'5º ano 10 semestre',label:"5º ano 10 semestre"},
];
$scope.tipoSanguineo = [
	{value:"A+",label:"A+"},
	{value:"B+",label:"B+"},
	{value:"AB+",label:"AB+"},
	{value:"A-",label:"A-"},
	{value:"B-",label:"B-"},
	{value:"AB-",label:"AB-"},
	{value:"0-",label:"0-"},
	{value:"0+",label:"0+"}
];
$scope.orgaos = [
          {value:"SSP-AC", label:"SSP-AC"}, 
          {value:"SSP-AL", label:"SSP-AL"}, 
          {value:"SSP-AM", label:"SSP-AM"}, 
          {value:"SSP-AP", label:"SSP-AP"}, 
          {value:"SSP-BA", label:"SSP-BA"}, 
          {value:"SSP-CE", label:"SSP-CE"}, 
          {value:"SSP-DF", label:"SSP-DF"}, 
          {value:"SSP-ES", label:"SSP-ES"}, 
          {value:"SSP-GO", label:"SSP-GO"}, 
          {value:"SSP-MA", label:"SSP-MA"}, 
          {value:"SSP-MT", label:"SSP-MT"}, 
          {value:"SSP-MS", label:"SSP-MS"}, 
          {value:"SSP-MG", label:"SSP-MG"}, 
          {value:"SSP-PA", label:"SSP-PA"}, 
          {value:"SSP-PB", label:"SSP-PB"}, 
          {value:"SSP-PR", label:"SSP-PR"}, 
          {value:"SSP-PE", label:"SSP-PE"}, 
          {value:"SSP-PI", label:"SSP-PI"}, 
          {value:"SSP-RJ", label:"SSP-RJ"}, 
          {value:"SSP-RN", label:"SSP-RN"}, 
          {value:"SSP-RO", label:"SSP-RO"}, 
          {value:"SSP-RS", label:"SSP-RS"}, 
          {value:"SSP-RR", label:"SSP-RR"}, 
          {value:"SSP-SC", label:"SSP-SC"}, 
          {value:"SSP-SE", label:"SSP-SE"}, 
          {value:"SSP-SP", label:"SSP-SP"}
];
$scope.parentescos = [
	        {value:"Esposo(a)", label:"Esposo(a)"},
            {value:"Filho(a)", label:"Filho(a)"},
            {value:"Mae", label:"Mãe"},
            {value:"Pai", label:"Pai"},
            {value:"Irmao", label:"Irmão"},
            {value:"Tio", label:"Tio"},
            {value:"Primo", label:"Primo"},
            {value:"Cunhado", label:"Cunhado"},
            {value:"Sogro", label:"Sogro"},
            {value:"Outros", label:"Outros"}
];

$scope.civil = function (dados) {
	if (dados == '2'){
	$scope.campoConjuge = true;
	} 
	if (dados == '1' || dados == null){
	$scope.campoConjuge = false;
	} 

};
$scope.plano = function (dados) {
	if (dados == '1'){
	$scope.campoQualPlano = true;
	} 
	if (dados == '0' || dados == null){
	$scope.campoQualPlano = false;
	} 
};
$scope.problema = function (dados) {
	if (dados == '1'){
	$scope.campoProblema = true;
	} 
	if (dados == '0' || dados == null){
	$scope.campoProblema = false;
	} 
};

$scope.bolsa = function (dados) {
	if (dados == '1'){
	$scope.campoBolsa = true;
	} 
	if (dados == '0' || dados == null){
	$scope.campoBolsa = false;
	} 
};
$scope.curso = function (dados) {
	if (dados == '1'){
	$scope.campoCurso = true;
	} 
	if (dados == '0' || dados == null){
	$scope.campoCurso = false;
	} 
};
$scope.desistiu = function (dados) {
	if (dados == '1'){
	$scope.campoDesistiu = true;
	} 
	if (dados == '0' || dados == null){
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
