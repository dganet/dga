app.config(function ($stateProvider, $urlRouterProvider){


  $stateProvider
    .state('login', {
      url: '/login',
      templateUrl: 'login/home.htm',
       controller:'loginCtrl',
    })

      .state('user', {
      url: '/user',
      templateUrl: 'painel/home.htm',
        
         ncyBreadcrumb: {
            label: 'Home'
         }
    })
//############# **  MODULO ASSOCIADO ** ###########################################################

      .state('user.associado', {
      url: '/associado',
      templateUrl: 'modAssociado/cadastroAssociadoLink.htm',
       ncyBreadcrumb: {
            label: 'Associado'
         }
    })


      .state('user.associado.inseri', {
      url: '/inseri',
      templateUrl: 'modAssociado/cadastroAssociado.htm',
      controller:'cadastroAssociadoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })

      .state('user.associado.altera', {
      url: '/altera',
      templateUrl: 'modAssociado/alteraAssociado.htm',
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
      templateUrl: 'modAssociado/portalAssociado.htm',
      controller:'portalAssociadoCtrl',
       ncyBreadcrumb: {
            label: 'Portal'
         }
    })

      .state('user.associado.portal.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },
            ncyBreadcrumb: {
            label: 'Altera'
         }

    })

      .state('user.associado.del', {
      url: '/del',
      templateUrl: 'modAssociado/del.htm',
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
      templateUrl: 'modVagas/periodoVagaLink.htm',
       ncyBreadcrumb: {
            label: 'Vagas'
         }
    })

      .state('user.vagas.inseri', {
      url: '/vagas',
      templateUrl: 'modVagas/inseriVagas.htm',
      controller:'inseriVagasCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Vagas'
         }
    })

      .state('user.vagas.remove', {
      url: '/remove',
      templateUrl: 'modVagas/removeVaga.htm',
      controller:'vagasPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Remove Vagas'
         }
    })


      .state('user.vagas.inseriAssociado', {
      url: '/inseriAssociado',
      templateUrl: 'modVagas/periodoAssociado.htm',
      controller:'vagasPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Associado'
         }
    })


      .state('user.vagas.listagem', {
      url: '/listagem',
      templateUrl: 'modVagas/listagem.htm',
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
      templateUrl: 'modNoticias/cadastraNoticiaLink.htm',
       ncyBreadcrumb: {
            label: 'Noticias'
         }
    })


      .state('user.noticia.inseri', {
      url: '/inseri',
      templateUrl: 'modNoticias/inseriNoticia.htm',
      controller:'inseriNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Noticia'
         }
    })

      .state('user.noticia.altera', {
      url: '/altera',
      templateUrl: 'modNoticias/alteraNoticia.htm',
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
      templateUrl: 'modCursos/cursoLink.htm',
       ncyBreadcrumb: {
            label: 'Cursos'
         }
    })


      .state('user.cursos.inseri', {
      url: '/inseri',
      templateUrl: 'modCursos/cadastraCurso.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })

      .state('user.cursos.altera', {
      url: '/altera',
      templateUrl: 'modCursos/alteraCurso.htm',
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
      templateUrl: 'modOportunidade/oportunidadeLink.htm',
       ncyBreadcrumb: {
            label: 'Oportunidade'
         }
    })


      .state('user.oportunidade.inseri', {
      url: '/inseri',
      templateUrl: 'modOportunidade/cadastraOportunidade.htm',
      controller:'cadastroNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Oportunidade'
         }
    })

      .state('user.oportunidade.altera', {
      url: '/altera',
      templateUrl: 'modOportunidade/alteraOportunidade.htm',
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
      templateUrl: 'modUsuario/link.htm',
       ncyBreadcrumb: {
            label: 'Usuario'
         }
    })


      .state('user.usuario.inseri', {
      url: '/inseri',
      templateUrl: 'modUsuario/inseriUsuario.htm',
      controller:'inseriUsuarioCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Usuario'
         }
    })

      .state('user.usuario.altera', {
      url: '/altera',
      templateUrl: 'modUsuario/alteraUsuario.htm',
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