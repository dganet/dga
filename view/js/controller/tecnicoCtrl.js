app.controller("tecnicoCtrl", function($scope, $http, $timeout , $location	, $rootScope){
    
   $scope.addTecnico = function(dados){
       $http.post('/App/tecnico/save', dados).then(function(response){
            console.log(dados);
        });
   }
});