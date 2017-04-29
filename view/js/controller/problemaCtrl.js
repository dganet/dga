app.controller("problemaCtrl", function($scope, $http, $timeout , $location	, $rootScope){
    
   $scope.addProblema = function(dados){
       $http.post('/App/problema/save', dados).then(function(response){
            console.log(response);
        });
   }
});