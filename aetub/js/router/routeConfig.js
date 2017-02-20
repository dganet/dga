app.config(function ($stateProvider, $urlRouterProvider){
  
  $stateProvider
    .state('home', {
      url: '/home',
      templateUrl: 'aetub/site/home.htm',
         controller:'homeCtrl',
    })

    .state('home.inicio', {
      url:'/inicio',
      templateUrl: 'aetub/site/inicio.htm',
    })

    .state('home.inicio.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },

      })

   .state('home.leiaMais', {
      url:'/leiaMais',
      templateUrl: 'aetub/site/leiaMais.htm'
    })

    .state('portal', {
      url:'/portal',
      templateUrl: 'aetub/portal/home.htm',
      controller: 'portalCtrl',

    })

    .state('portal.noticias', {
      url:'/noticias',
      templateUrl: 'aetub/portal/noticias.htm',
      controller: 'noticiasCtrl',

    })
    .state('portal.noticias.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },

      })


    .state('portal.oportunidades', {
      url:'/oportunidades',
      templateUrl: 'aetub/portal/oportunidades.htm',
      controller: 'oportunidadesCtrl',

    })
    .state('portal.oportunidades.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },

      })
    .state('portal.cursos', {
      url:'/cursos',
      templateUrl: 'aetub/portal/cursos.htm',
      controller: 'cursosCtrl',

    })
    .state('portal.cursos.detalhes', {
      url: '/:id',
       controller: function($scope, $stateParams) {
            // get the id
            $scope.id = $stateParams.id;
        },

      })


  $urlRouterProvider.otherwise("/home/inicio");



});

