app.config(function ($stateProvider, $urlRouterProvider){
  
  $stateProvider
    .state('home', {
      url: '/home',
      templateUrl: 'site/home.htm',
         controller:'homeCtrl',
    })

  $urlRouterProvider.otherwise("/home");



});

