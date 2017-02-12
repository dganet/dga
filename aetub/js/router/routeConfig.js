app.config(function ($stateProvider, $urlRouterProvider){
  
  $stateProvider
    .state('home', {
      url: '/home',
      templateUrl: 'aetub/site/home.htm',
         controller:'homeCtrl',
    })

    .state('home.inicio', {
      url:'/inicio',
      templateUrl: 'aetub/site/inicio.htm'

    })

   .state('home.leiaMais', {
      url:'/leiaMais',
      templateUrl: 'aetub/site/leiaMais.htm'
    })

  $urlRouterProvider.otherwise("/home/inicio");



});

