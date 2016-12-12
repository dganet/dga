app.config(function ($stateProvider, $urlRouterProvider){
  
  $stateProvider
    .state('login', {
      url: '/login',
      templateUrl: 'view/login/home.htm',
         controller:'homeCtrl'
    })

    .state('user', {
      url:'/user',
      templateUrl: 'view/painel/home.htm',
      controller:'userCtrl'

    })

      .state('user.incio', {
      url:'/inicio',
      templateUrl: 'view/painel/inicio.htm',
      controller: 'userCtrl'
    })

      .state('user.inicio', {
      url:'/inicio/primeiro',
      templateUrl: 'view/url/primeiro.htm',
      controller: 'userCtrl'
    })

  $urlRouterProvider.otherwise("/login");



});