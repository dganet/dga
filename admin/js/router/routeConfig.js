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
      resolve: { 
          function ($sessionStorage, $location){
            if (sessionStorage.getItem('usuario.id') == null){ 
                $location.path('/login');
            }
        }
     
      },
        
         ncyBreadcrumb: {
            label: 'Home'
         }
      
    })
//############# **  MODULO ASSOCIADO ** ###########################################################

      .state('user.associado', {
      url: '/associado',
      templateUrl: 'modAssociado/associadoLink.htm',
      resolve: { 
          function ($sessionStorage, $location){
            if (sessionStorage.getItem('usuario.id') == null){ 
                $location.path('/login');
            }
        }
     
      },
       ncyBreadcrumb: {
            label: 'Associado'
         }
    })


      .state('user.associado.inseri', {
      url: '/inseri',
      templateUrl: 'modAssociado/inseriAssociado.htm',
      controller:'inseriAssociadoCtrl',
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
//############# **  MODULO NOTICIAS ** ##########################################
//############################################################################
      .state('user.noticia', {
      url: '/noticia',
      templateUrl: 'modNoticias/noticiaLink.htm',
      resolve: { 
          function ($sessionStorage, $location){
            if (sessionStorage.getItem('usuario.id') == null){ 
                $location.path('/login');
            }
        }
     
      },
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
      controller:'alteraNoticiaCtrl',
       ncyBreadcrumb: {
            label: 'Altera'
         }
    })
      .state('user.noticia.altera.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },
               ncyBreadcrumb: {
            label: 'Posts'
         }
    })

//############################################################################
//############# **  MODULO CURSOS ** ##########################################
//############################################################################
      .state('user.curso', {
      url: '/curso',
      templateUrl: 'modCursos/cursoLink.htm',
      resolve: { 
          function ($sessionStorage, $location){
            if (sessionStorage.getItem('usuario.id') == null){ 
                $location.path('/login');
            }
        }
     
      },
       ncyBreadcrumb: {
            label: 'Curso'
         }
    })


      .state('user.curso.inseri', {
      url: '/inseri',
      templateUrl: 'modCursos/inseriCurso.htm',
      controller:'inseriCursoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri'
         }
    })

      .state('user.curso.altera', {
      url: '/altera',
      templateUrl: 'modCursos/alteraCurso.htm',
      controller:'alteraCursoCtrl',
       ncyBreadcrumb: {
            label: 'Altera'
         }
    })

      .state('user.curso.altera.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },
               ncyBreadcrumb: {
            label: 'Cursos'
         }
    })

//############################################################################
//############# **  MODULO OPORTUNIDADE ** ##########################################
//############################################################################
      .state('user.oportunidade', {
      url: '/oportunidade',
      templateUrl: 'modOportunidade/oportunidadeLink.htm',
      resolve: { 
          function ($sessionStorage, $location){
            if (sessionStorage.getItem('usuario.id') == null){ 
                $location.path('/login');
            }
        }
     
      },
       ncyBreadcrumb: {
            label: 'Oportunidade'
         }
    })


      .state('user.oportunidade.inseri', {
      url: '/inseri',
      templateUrl: 'modOportunidade/inseriOportunidade.htm',
      controller:'inseriOportunidadeCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Oportunidade'
         }
    })

      .state('user.oportunidade.altera', {
      url: '/altera',
      templateUrl: 'modOportunidade/alteraOportunidade.htm',
      controller:'alteraOportunidadeCtrl',
       ncyBreadcrumb: {
            label: 'Altera Oportunidade'
         }
    })

      .state('user.oportunidade.altera.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },
               ncyBreadcrumb: {
            label: 'Oportunidades'
         }
    })

//############################################################################
//############# **  MODULO USUARIO ** ##########################################
//############################################################################
      .state('user.usuario', {
      url: '/usuario',
      templateUrl: 'modUsuario/link.htm',
      resolve: { 
          function ($sessionStorage, $location){
            if (sessionStorage.getItem('usuario.id') == null){ 
                $location.path('/login');
            }
        }
     
      },
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
//############# **  MODULO Periodo ** ##########################################
//############################################################################
      .state('user.periodo', {
      url: '/periodo',
      templateUrl: 'modPeriodo/periodoLink.htm',
      resolve: { 
          function ($sessionStorage, $location){
            if (sessionStorage.getItem('usuario.id') == null){ 
                $location.path('/login');
            }
        }
     
      },
       ncyBreadcrumb: {
            label: 'Periodo'
         }
    })


      .state('user.periodo.inseri', {
      url: '/inseri',
      templateUrl: 'modPeriodo/inseriPeriodo.htm',
      controller:'inseriPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Inseri Periodo'
         }
    })

      .state('user.periodo.altera', {
      url: '/altera',
      templateUrl: 'modPeriodo/alteraPeriodo.htm',
      controller:'alteraPeriodoCtrl',
       ncyBreadcrumb: {
            label: 'Altera Periodo'
         }
    })

      .state('user.periodo.altera.detalhes', {
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
//############# **  MODULO CONFIGURAÇÕES ** ##########################################
//############################################################################



//############################################################################
        $urlRouterProvider.otherwise("/login");
    
});