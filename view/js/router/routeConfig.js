app.config(function ($stateProvider, $urlRouterProvider){
  
  $stateProvider
    .state('login', {
      url: '/login',
      templateUrl: 'view/login/home.htm',
         controller:'homeCtrl'
    })

    .state('home.inicio', {
      url:'/inicio',
      templateUrl: 'view/login/inicio.htm'

    })

    .state('home.teste', {
      url:'/teste',
      templateUrl: 'view/site/teste.htm'
    })

    .state('home.leiaMais', {
      url:'/leiaMais',
      templateUrl: 'view/site/leiaMais.htm'
    })

      .state('associado', {
      url:'/associado',
      templateUrl: 'view/associado/home.htm'
    })

      .state('associado.fatura', {
      url:'/fatura',
      templateUrl: 'view/associado/fatura.htm'
    })

  $urlRouterProvider.otherwise("/login");



});