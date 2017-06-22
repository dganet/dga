app.config(function ($stateProvider, $urlRouterProvider){
  
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

    .state('corretor', {
      url: '/corretor',
      templateUrl: 'view/site/corretor.htm',
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
      templateUrl: 'view/modCliente/linkCliente.htm',
       ncyBreadcrumb: {
            label: 'Modulo Cliente'
         }
    })

      .state('user.cliente.new', {
      url: '/inseri',
      templateUrl: 'view/modCliente/newCliente.htm',
      controller : 'clienteCtrl',
       ncyBreadcrumb: {
            label: 'Novo Cliente'
         }
    })

      .state('user.cliente.update', {
      url: '/update',
      templateUrl: 'view/modCliente/updateCliente.htm',
      controller : 'clienteCtrl',
       ncyBreadcrumb: {
            label: 'Atualiza Cliente'
         }
    })

      .state('user.cliente.update.detalhes', {
		 	 url: '/:id',
			 controller: function($scope, $stateParams) {
						// get the id
						$scope.id = $stateParams.id;
				},
							ncyBreadcrumb: {
						label: 'Altera'
				 }
		})

//|#######################################################|
//|############# **  MODULO IMOVEIS ** ###################|
//|#######################################################|
      .state('user.imovel', {
      url: '/imovel',
      templateUrl: 'view/modImovel/linkImovel.htm',
       ncyBreadcrumb: {
            label: 'Modulo Imovel'
         }
    })

      .state('user.imovel.new', {
      url: '/inseri',
      templateUrl: 'view/modImovel/newImovel.htm',
      controller: 'imovelCtrl',
       ncyBreadcrumb: {
            label: 'Novo Imovel'
         }
    })

      .state('user.imovel.newProprietario', {
      url: '/inseri',
      templateUrl: 'view/modImovel/newProprietario.htm',
       ncyBreadcrumb: {
            label: 'Novo Proprietario'
         }
    })
      .state('user.imovel.update', {
      url: '/update',
      templateUrl: 'view/modImoveil/updateImoveil.htm',
       ncyBreadcrumb: {
            label: 'Atualiza Imoveil'
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
      templateUrl: 'view/modPerfil/linkPerfil.htm',
       ncyBreadcrumb: {
            label: 'Modulo Perfil'
         }
    })
      .state('user.perfil.picture', {
      url: '/imagem',
      templateUrl: 'view/modPerfil/picturePerfil.htm',
      controller:'picturePerfilCtrl',
       ncyBreadcrumb: {
            label: 'Mudar Imagem do Perfil'
         }
    })
      .state('user.perfil.update', {
      url: '/altera',
      templateUrl: 'view/modPerfil/updatePerfil.htm',
       ncyBreadcrumb: {
            label: 'Atualiza os Dados'
         }
    })
      .state('user.perfil.delete', {
      url: '/deleta',
      templateUrl: 'view/modPerfil/deletePerfil.htm',
       ncyBreadcrumb: {
            label: 'Deleta os Dados'
         }
    })
//|#######################################################|
//|############# **  FIM DOS MODULOS ** ##################|
//|#######################################################|

  $urlRouterProvider.otherwise("/site/inicio");



});