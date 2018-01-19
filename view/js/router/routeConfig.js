app.config(function ($stateProvider, $urlRouterProvider, $locationProvider){

  $stateProvider
//|#######################################################|
//|############# **  SITE ** ###################|
//|#######################################################|
    .state('login', {
      url: '/site',
      templateUrl: 'view/site/home.htm',
         controller:'siteCtrl'
         
    })

    .state('login.inicio', {
      url: '/inicio',
      templateUrl: 'view/site/inicio.htm',
      controller:'siteCtrl',
    })
    
    .state('login.forget', {
      url: '/forget',
      templateUrl: 'view/site/lostpwd.htm',
      controller:'lostpwdCtrl',
    })

    .state('corretor', {
      url: '/corretor',
      templateUrl: 'view/site/corretor.htm',
      controller:'corretorCtrl',
    })

    .state('cidade', {
      url: '/cidade',
      templateUrl: 'view/site/cidade.htm',
      controller:'cidadeCtrl',
    })


      .state('cidade.detalhes', {
		 	 url: '/:id',
			 controller: function($scope, $stateParams) {
						// get the id
						$scope.id = $stateParams.id;
				},
							ncyBreadcrumb: {
						label: 'Altera'
				 }
		})

      .state('user', {
      url: '/user',
      templateUrl: 'view/painel/home.htm',
         controller:'painelCtrl',
         ncyBreadcrumb: {
            label: 'Home'
         }
    })

    /* Inserção de Modulos  */

//|#######################################################|
//|############# **  MODULO CLIENTE ** ###################|
//|#######################################################|

      .state('user.cliente', {
      url: '/cliente',
      templateUrl: 'view/modulos/cliente.htm',
      controller:'clienteCtrl',
       ncyBreadcrumb: {
            label: 'Modulo Cliente'
         }
    })

//|#######################################################|
//|############# **  MODULO IMOVEIS ** ###################|
//|#######################################################|
      .state('user.imovel', {
      url: '/imovel',
      templateUrl: 'view/modulos/imovel.htm',
      controller: 'imovelCtrl',
       ncyBreadcrumb: {
            label: 'Modulo Imovel'
         }
    })
      
//|#######################################################|
//|############# **  MODULO FINANCEIRO ** ################|
//|#######################################################|

//|#######################################################|
//|############# **  MODULO E-MAIL ** ####################|
//|#######################################################|
      .state('user.email', {
      url: '/email',
      templateUrl: 'view/modEmail/linkEmail.htm',
       ncyBreadcrumb: {
            label: 'Modulo Email'
         }
    })

      .state('user.email.new', {
      url: '/inseri',
      templateUrl: 'view/modEmail/newEmail.htm',
       ncyBreadcrumb: {
            label: 'Novo Email'
         }
    })

      .state('user.email.entrada', {
      url: '/entrada',
      templateUrl: 'view/modEmail/entradaEmail.htm',
       ncyBreadcrumb: {
            label: 'Caixa de Entrada de E-mail'
         }
    })

      .state('user.email.saida', {
      url: '/saida',
      templateUrl: 'view/modEmail/saidaEmail.htm',
       ncyBreadcrumb: {
            label: 'Caixa de Saida de E-mail'
         }
    })
//|#######################################################|
//|############# **  MODULO ESTATICA ** ##################|
//|#######################################################|
      .state('user.estatistica', {
      url: '/estatistica',
      templateUrl: 'view/modEstastitica/linkEstatistica.htm',
       ncyBreadcrumb: {
            label: 'Modulo Estatistica'
         }
    })

      .state('user.estastitica.visitas', {
      url: '/visitas',
      templateUrl: 'view/modEstastitica/visistasEstastitica.htm',
       ncyBreadcrumb: {
            label: 'Visitas'
         }
    })
  
        .state('user.estastitica.cliques', {
      url: '/cliques',
      templateUrl: 'view/modEstastitica/cliquesEstastitica.htm',
       ncyBreadcrumb: {
            label: 'Cliques'
         }
    })
  
        .state('user.estastitica.grafico', {
      url: '/grafico',
      templateUrl: 'view/modEstastitica/graficosEstastitica.htm',
       ncyBreadcrumb: {
            label: 'Graficos'
         }
    })
//|#######################################################|
//|############# **  MODULO VIZINHOS ** ##################|
//|#######################################################|

//|#######################################################|
//|############# **  MODULO CONTA ** #####################|
//|#######################################################|
      .state('user.conta', {
      url: '/conta',
      templateUrl: 'view/modConta/linkConta.htm',
       ncyBreadcrumb: {
            label: 'Modulo Conta'
         }
    })

      .state('user.conta.planos', {
      url: '/inseri',
      templateUrl: 'view/modConta/planos.htm',
      controller: 'planosCtrl',
       ncyBreadcrumb: {
            label: 'Planos'
         }
    })
//|#######################################################|
//|############# **  MODULO PERFIL ** ####################|
//|#######################################################|
      .state('user.perfil', {
      url: '/perfil',
      templateUrl: 'view/modulos/perfil.htm',
      controller:'perfilCtrl',
       ncyBreadcrumb: {
            label: 'Modulo Perfil'
         }
    })

//|#######################################################|
//|############# **  FIM DOS MODULOS ** ##################|
//|#######################################################|

  $urlRouterProvider.otherwise("/site/inicio");

  // Utilizando o HTML5 History API
    $locationProvider.html5Mode(false);

});