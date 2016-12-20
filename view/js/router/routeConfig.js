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

      .state('user.associados', {
      url: '/associados',
      templateUrl: 'view/modAssociado/associados.htm',
       ncyBreadcrumb: {
            label: 'Associado'
         }
    })

      .state('user.cadastroAssociado', {
      url: '/cadastroAssociado',
      templateUrl: 'view/modAssociado/cadastroAssociadoLink.htm',
       ncyBreadcrumb: {
            label: 'Cadastro Associado'
         }
    })


      .state('user.cadastroAssociado.inseri', {
      url: '/inseriCadastro',
      templateUrl: 'view/modAssociado/cadastroAssociado.htm',
       ncyBreadcrumb: {
            label: 'Inseri Cadastro'
         }
    })

    
  $urlRouterProvider.otherwise("/login");



});