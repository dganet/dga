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

      .state('user.associado', {
      url: '/associado',
      templateUrl: 'view/modAssociado/cadastroAssociadoLink.htm',
       ncyBreadcrumb: {
            label: 'Associado'
         }
    })


      .state('user.associado.inseri', {
      url: '/inseri',
      templateUrl: 'view/modAssociado/cadastroAssociado.htm',
      controller:'cadastroAssociadoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })
        $urlRouterProvider.otherwise("/login");
    
});