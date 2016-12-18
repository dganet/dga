app.config(function ($stateProvider, $urlRouterProvider){
  
  $stateProvider
    .state('login', {
      url: '/login',
      templateUrl: 'view/login/home.htm',
         controller:'homeCtrl'
    })

      .state('user', {
      url: '/user',
      templateUrl: 'view/painel/home.htm',
         controller:'homeCtrl',
         ncyBreadcrumb: {
            label: 'Home'
         }
    })

    /* Inserção de Modulos  */

      .state('user.modulolinks', {
      url: '/modulolinks',
      templateUrl: 'view/modulo/links.htm',
       ncyBreadcrumb: {
            label: 'Modulo'
         }
    })

      .state('user.modulolinks.subs', {
      url: '/sublink',
      templateUrl: 'view/modulo/modulo.html',
       ncyBreadcrumb: {
            label: 'Links Modulo'
         }
    })


    
  $urlRouterProvider.otherwise("/login");



});