app.controller("alteraAssociadoCtrl", function($scope){
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

$scope.associados = [
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
{cod:'001', nome:'Adnilton da Silva Santos'},
{cod:'002', nome:'Guilherme Lima de Britto'},
{cod:'003', nome:'Ligia Victora Lima de Britto'},
];

});