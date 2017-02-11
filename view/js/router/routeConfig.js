app.config(function ($stateProvider, $urlRouterProvider){


  $stateProvider
    .state('login', {
      url: '/login',
      templateUrl: 'view/login/home.htm',
       controller:'loginCtrl',
    })

      .state('user', {
      url: '/user',
      templateUrl: 'view/painel/home.htm',
        
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
            label: 'Altera Usuario'
         }
    })

      .state('user.associado.altera.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },
              ncyBreadcrumb: {
            label: 'Altera'
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
      url: '/:id',
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
//############# **  MODULO VAGAS ** ##########################################
//############################################################################


      .state('user.vagas', {
      url: '/periodo',
      templateUrl: 'view/modVagas/periodoVagaLink.htm',
       ncyBreadcrumb: {
            label: 'Vagas'
         }
    })

      .state('user.vagas.inseri', {
      url: '/vagas',
      templateUrl: 'view/modVagas/periodoVaga.htm',
      controller:'vagasPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Vagas'
         }
    })

      .state('user.vagas.remove', {
      url: '/remove',
      templateUrl: 'view/modVagas/removeVaga.htm',
      controller:'vagasPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Remove Vagas'
         }
    })


      .state('user.vagas.inseriAssociado', {
      url: '/inseriAssociado',
      templateUrl: 'view/modVagas/periodoAssociado.htm',
      controller:'vagasPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Associado'
         }
    })


      .state('user.vagas.listagem', {
      url: '/listagem',
      templateUrl: 'view/modVagas/listagem.htm',
      controller:'vagasPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Listagem de Vagas'
         }
    })

//############################################################################
//############# **  MODULO NOTICIAS ** ##########################################
//############################################################################
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

      .state('user.noticia.altera', {
      url: '/altera',
      templateUrl: 'view/modNoticias/alteraNoticia.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Altera'
         }
    })

//############################################################################
//############# **  MODULO CURSOS ** ##########################################
//############################################################################
      .state('user.cursos', {
      url: '/cursos',
      templateUrl: 'view/modCursos/cursoLink.htm',
       ncyBreadcrumb: {
            label: 'Cursos'
         }
    })


      .state('user.cursos.inseri', {
      url: '/inseri',
      templateUrl: 'view/modCursos/cadastraCurso.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })

      .state('user.cursos.altera', {
      url: '/altera',
      templateUrl: 'view/modCursos/alteraCurso.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Altera'
         }
    })

//############################################################################
//############# **  MODULO OPORTUNIDADE ** ##########################################
//############################################################################
      .state('user.oportunidade', {
      url: '/oportunidade',
      templateUrl: 'view/modOportunidade/oportunidadeLink.htm',
       ncyBreadcrumb: {
            label: 'Oportunidade'
         }
    })


      .state('user.oportunidade.inseri', {
      url: '/inseri',
      templateUrl: 'view/modOportunidade/cadastraOportunidade.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Oportunidade'
         }
    })

      .state('user.oportunidade.altera', {
      url: '/altera',
      templateUrl: 'view/modOportunidade/alteraOportunidade.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Altera Oportunidade'
         }
    })

//############################################################################
//############# **  MODULO USUARIO ** ##########################################
//############################################################################
      .state('user.usuario', {
      url: '/usuario',
      templateUrl: 'view/modUsuario/link.htm',
       ncyBreadcrumb: {
            label: 'Usuario'
         }
    })


      .state('user.usuario.inseri', {
      url: '/inseri',
      templateUrl: 'view/modUsuario/inseriUsuario.htm',
      controller:'inseriUsuarioCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Usuario'
         }
    })

      .state('user.usuario.altera', {
      url: '/altera',
      templateUrl: 'view/modUsuario/alteraUsuario.htm',
      controller:'alteraUsuarioCtrl',
       ncyBreadcrumb: {
            label: 'Altera Usuario'
         }
    })

      .state('user.usuario.altera.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },
              ncyBreadcrumb: {
            label: 'Altera'
         }

    })

//############################################################################
        $urlRouterProvider.otherwise("/login");
    
});