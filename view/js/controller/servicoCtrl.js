app.controller("servicoCtrl", function($scope, $http, $timeout , $location	, $rootScope){
    
   $scope.addServico = function(dados){
       $http.post('/App/servico/save', dados).then(function(response){
            console.log(dados);
        });
   }
});