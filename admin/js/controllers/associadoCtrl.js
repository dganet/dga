app.controller("associadoCtrl",function($scope, restful, $location , $timeout ){
      //Pega o Token 
  var token = sessionStorage.getItem('usuario.token'); 

  //scope.master vazio;
  $scope.master = {};
  //Ocultando o Alert Mensagem .
  $scope.mensagemSucesso = true;
  $scope.mensagemAtualizado = true;
  $scope.mensagemDelete = true;
  

  //função que oculta e mostra as tabs
  $scope.go = function (dados){
    $scope.tabs = dados;
};

//Novo registro. zera todas informaçoes do objeto
    $scope.novo = function(){
      // CEP E CIDADE FIXA
      $scope.associado = {
          cep: '11250000',
          cidade: 'Bertioga',};  
    };

//Boleano do Form
$scope.boleano = [
  {label:'Sim',b:"1"},{label: 'Não', b:"0"}
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

// Lista de Orgãos   
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
//Estado Civil
$scope.bosta = [
  {id:'1',label:"Solteiro(a)"},
  {id:'2',label:"Casado(a)"}
];

//Tipo Sanguineio
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
//Duração de Cursos
$scope.duracaoDeCurso = [
  {value:'1º semestre',label:"1º semestre"},
  {value:'2º semestre',label:"2º semestre"},
  {value:'3º semestre',label:"3º semestre"},
  {value:'4º semestre',label:"4º semestre"},
  {value:'5º semestre',label:"5º semestre"},
  {value:'6º semestre',label:"6º semestre"},
  {value:'7º semestre',label:"7º semestre"},
  {value:'8º semestre',label:"8º semestre"},
  {value:'9º semestre',label:"9º semestre"},
  {value:'10º semestre',label:"10º semestre"},
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

$scope.tipoDocumentos = [
            {value:"RG", label:"RG"},
            {value:"CPF", label:"CPF"},
            {value:"CNH", label:"CNH"},
            {value:"Certidao de Nascimento", label:"Certidão de Nascimento"},
            {value:"Titulo de Eleitor", label:"Titulo de Eleitor"},
            {value:"Comprovante de Residencia", label:"Comprovante de Residencia"},
];

// Funcoes de adicionar inputs de renda e documentos
var dados = $scope.renda = [];
var renda = {renda:dados};
var dadosDoc = $scope.documento = [];
var documento = {documento:dadosDoc};

$scope.addInput = function(){
  var newInputs = $scope.renda.lenght+1;
  $scope.renda.push({nomeParentesco:'',grauParentesco:'',rendaParentesco:''});
};

$scope.removeInput = function() {
   var lastItem = $scope.renda.length-1;
   $scope.renda.splice(lastItem);
 };

 $scope.addDocumento = function(){
  var newInputs = $scope.documento.lenght+1;
  $scope.documento.push({tipoDocumento:'',anexoDocumento:''});
};

$scope.removeDocumento = function() {
   var lastItem = $scope.documento.length-1;
   $scope.documento.splice(lastItem);
 };


  //Lista todas Associados
	restful.associadoList().success(function(data){
		$scope.associados = data;       
	}); 
  
    //Lista todas Cursos
  restful.cursofaculdadeList().success(function(data){
    $scope.cursos = data;       
  }); 
  
    //Lista todas Universidade
  restful.universidadeList().success(function(data){
    $scope.universidades = data;     
  }); 

  $scope.selectUni = function(id){
    restful.universidadeListVeiculo(id).success(function(data){
      $scope.veiculos = data;
    });
  };


  //Lista todas Associados
  restful.associadoListPre().success(function(data){
    $scope.associadospre = data;       
  }); 

// Show modaais de detalhes, alterar e deletar.
$scope.dados = function (id){
    //Resentando 
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.associado = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();
        //Pega as info da universidade selecionada
		restful.associadoListId(id).success(function(data){
		$scope.associado = data[0];	
        });
};
//*************CADASTRA NOVO ASSOCIADO *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.add = function(values, FormAssociado) {
    var associado = values;
    var associado = angular.merge(associado,renda,documento);

    if (values.nome == undefined || values.cpf == undefined || values.salario == undefined || values.universidade == undefined){

      $scope.mensagemObrigatorio = true;
          $timeout(function () {
               $scope.mensagemObrigatorio = false;
           },10000);
  

      
    }else{

    // Enviado os valores em objetos para api/user do php/slim
    restful.associadoSave(values,token).success(function(){
      // Fecha o Modal
      $('#closeModalPost').modal('hide');
    
    //Lista todas Associado
    restful.associadoList().success(function(data){
		$scope.cursos = data;       
	});
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemSucesso = false;
      $timeout(function () {
               $scope.mensagemSucesso = true;
           },10000);
    });
     //Resentando os input do formulario .
    $scope.reset = function() {
    // Copiando os valores vazio do scope.master 
      $scope.associado = angular.copy($scope.master);
    };
    // Ativando a função
    $scope.reset();
};
  };

//*************UPDATE UNIVERSIDADE *********************//   

//Passa os valores do form em Objeto no "values"
  $scope.put = function(values, Form) {
	 var id = values.id;

    // Enviado os valores em objetos para api/user do php/slim
    restful.associadoPut(id,values,token).success(function(){
     // Fecha o Modal
      $('#closeModalUpdate').modal('hide');

        //Lista todas Cursos
        restful.associadoList().success(function(data){
            $scope.cursos = data;       
        });
         
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemAtualizado = false;
      $timeout(function () {
               $scope.mensagemAtualizado = true;
           },10000);

    });

};

//*************DELETE UNIVERSIDADE *********************// 

//Passa os valores do form em Objeto no "values"
  $scope.del = function(values) {
    // Enviado os valores em objetos para api/user do php/slim
    restful.associadoDel(values,token).success(function(){
    // Fecha o Modal
      $('#closeModalDel').modal('hide');
        
     //Lista todas Associado
        restful.associadoList().success(function(data){
            $scope.cursos = data;       
        });
        
      // Funcão de exibir a mensagem de sucesso em 5 segundos.
      $scope.mensagemDelete = false;
      $timeout(function () {
               $scope.mensagemDelete = true;
           },10000);

    });
  };
    
});