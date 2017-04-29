app.controller("osCtrl", function($scope, $http, $timeout , $location	, $rootScope){
    $scope.success = true;
    $scope.error = true;
    $scope.loadTecnicos = function(){
        $http.get('/App/tecnico/list').then(function(response){
            $scope.tecnicos = response.data;
        });
    }
    $scope.loadProblemas = function(){
        $http.get('/App/problema/list').then(function(response){
            $scope.problemas = response.data;
        });
    }
    $scope.loadBairros = function(){
        $http.get('/App/bairro/list').then(function(response){
            $scope.bairros = response.data;
        });
    }
    
    $scope.loadServicos = function(){
        $http.get('/App/servico/list').then(function(response){
            $scope.servicos = response.data;
        });
    }
    
    
    $scope.addOs = function(dados){
        dados.fkTecnico = 0;
        dados.fkProblema = 0;
        $http.post('/App/os/cadastrar', dados).then(function(response){
            console.log(response.data);
            if(response.data == true ){
                $scope.success = false;
                $timeout(function () {
			               $scope.success = true;
			    },5000);
            }else{
                console.log("cheguei aqui 2");
                $scope.error=false; 
            }
        });
    }

   
        $http.get('/App/os/list').then(function(response){
            os = response.data;
            os.forEach(function(element) {
                $http.get('/App/bairro/list/'+ os.fkBairro).then(function(response){
                   element.fkBairro = response.data.nomeBairro
                })    
            }, this);
            $scope.oss = os;
        });
    

});