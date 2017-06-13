app.controller('planosCtrl', function($scope, $http){
       $scope.pagseguro = function(){
            $http.get('').success(function(response){
                console.log(response);
            });
       };
});