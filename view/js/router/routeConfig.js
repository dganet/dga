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
//############# **  MODULO ASSOCIADO ** ###########################################################

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

      .state('user.associado.altera', {
      url: '/altera',
      templateUrl: 'view/modAssociado/alteraAssociado.htm',
      controller:'alteraAssociadoCtrl',
       ncyBreadcrumb: {
            label: 'Alterar'
         }
    })

      .state('user.associado.altera.detalhes', {
      url: '/:idAssociado',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.idAssociado;
        }
    })

      .state('user.associado.portal', {
      url: '/portal',
      templateUrl: 'view/modAssociado/portalAssociado.htm',
      controller:'alteraAssociadoCtrl',
       ncyBreadcrumb: {
            label: 'Portal'
         }
    })

      .state('user.associado.portal.detalhes', {
      url: '/:idAssociado',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.idAssociado;
        }
    })

      .state('user.associado.del', {
      url: '/del',
      templateUrl: 'view/modAssociado/del.htm',
      controller:'alteraAssociadoCtrl',
       ncyBreadcrumb: {
            label: 'Deleta'
         }
    })

      .state('user.associado.del.detalhes', {
      url: '/:idAssociado',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.idAssociado;
        }
    })

//############################################################################


      .state('user.periodo', {
      url: '/periodo',
      templateUrl: 'view/modVagas/periodoVagaLink.htm',
       ncyBreadcrumb: {
            label: 'Periodo'
         }
    })

      .state('user.periodo.inseri', {
      url: '/periodo',
      templateUrl: 'view/modVagas/periodoVaga.htm',
      controller:'vagasPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })

      .state('user.vaga', {
      url: '/vaga',
      templateUrl: 'view/modVagas/cadastroVagaLink.htm',
       ncyBreadcrumb: {
            label: 'Vagas'
         }
    })


      .state('user.vaga.inseri', {
      url: '/inseri',
      templateUrl: 'view/modVagas/cadastroVaga.htm',
      controller:'cadastroAssociadoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })

      .state('user.noticia', {
      url: '/noticia',
      templateUrl: 'view/modNoticias/cadastraNoticiaLink.htm',
       ncyBreadcrumb: {
            label: 'Noticias'
         }
    })


      .state('user.noticia.inseri', {
      url: '/inseri',
      templateUrl: 'view/modNoticias/cadastraNoticia.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })
        $urlRouterProvider.otherwise("/login");
    
});