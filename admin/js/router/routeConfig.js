app.config(function ($stateProvider, $urlRouterProvider) {

	$stateProvider
		.state('login', {
			url: '/login',
			templateUrl: 'login/home.htm',
			controller: 'loginCtrl',
		})

		.state('user', {
			url: '/user',
			templateUrl: 'painel/home.htm',
			resolve: {
				function($sessionStorage, $location) {		
					if (sessionStorage.getItem('usuario.token') == null) { 
						$location.path('/login');
					}
				}

			},

			ncyBreadcrumb: {
				label: 'Home'
			}

		})
		//############################################################################
		//############# **  MODULO ASSOCIADO ** ##########################################
		//############################################################################

		.state('user.associado', {
			url: '/associado',
			templateUrl: 'modulos/associado.htm',
			controller:'associadoCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) { 
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Associado'
			}
		})

/*
		.state('user.associado.inseri', {
			url: '/inseri',
			templateUrl: 'modAssociado/inseriAssociado.htm',
			controller: 'inseriAssociadoCtrl',
			ncyBreadcrumb: {
				label: 'Inseri'
			}
		})

		.state('user.associado.altera', {
			url: '/altera',
			templateUrl: 'modAssociado/alteraAssociado.htm',
			controller: 'alteraAssociadoCtrl',
			ncyBreadcrumb: {
				label: 'Altera Usuario'
			}
		})

		.state('user.associado.altera.detalhes', {
			url: '/:id',
			controller: function ($scope, $stateParams) {
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
			controller: 'portalAssociadoCtrl',
			ncyBreadcrumb: {
				label: 'Portal'
			}
		})

		.state('user.associado.portal.detalhes', {
			url: '/:id',
			controller: function ($scope, $stateParams) {
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
			controller: 'alteraAssociadoCtrl',
			ncyBreadcrumb: {
				label: 'Deleta'
			}
		})

		.state('user.associado.del.detalhes', {
			url: '/:idAssociado',
			controller: function ($scope, $stateParams) {
				// get the id
				$scope.id = $stateParams.idAssociado;
			}
		})
		.state('user.associado.aprova', {
			url: '/aprova',
			templateUrl: 'modAssociado/aprovaAssociado.htm',
			controller: 'aprovaAssociadoCtrl',
			ncyBreadcrumb: {
				label: 'Aprova'
			}
		})
		.state('user.associado.aprova.detalhes', {
			url: '/:idAssociado',
			controller: function ($scope, $stateParams) {
				// get the id
				$scope.id = $stateParams.idAssociado;
			}
		})

		.state('user.associado.curso', {
			url: '/cursos',
			templateUrl: 'modAssociado/associadoPorCurso.htm',
			controller: 'associadoPorCursoCtrl',
			ncyBreadcrumb: {
				label: 'Associada Por Curso'
			}
		})
		.state('user.associado.curso.detalhes', {
			url: '/:idAssociado',
			controller: function ($scope, $stateParams) {
				// get the id
				$scope.id = $stateParams.idAssociado;
			},
			ncyBreadcrumb: {
				label: 'Lista de Associados'
			}
		})
*/
		//############################################################################
		//############# **  MODULO TICKET ** ##########################################
		//############################################################################	

		.state('user.ticket', {
			url: '/ticket',
			templateUrl: 'modTicket/linkTicket.htm',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) { 
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Ticket'
			}
		})

		.state('user.ticket.altera', {
			url: '/altera',
			templateUrl: 'modTicket/allTickets.htm',
			controller: 'allTicketCtrl',
			ncyBreadcrumb: {
				label: 'Todos Tickets'
			}
		})

		.state('user.ticket.altera.detalhes', {
			url: '/:id',
			controller: function ($scope, $stateParams) {
				// get the id
				$scope.id = $stateParams.id;
			},
			ncyBreadcrumb: {
				label: 'Ticktes'
			}
		})

		//############################################################################
		//############# **  MODULO BANNER ** ##########################################
		//############################################################################		

		.state('user.banner', {
			url: '/banner',
			templateUrl: 'modulos/banner.htm',
			controller: 'bannerCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'banner'
			}
		})

		//############################################################################
		//############# **  MODULO NOTICIAS ** ##########################################
		//############################################################################
		.state('user.noticia', {
			url: '/noticia',
			templateUrl: 'modulos/noticias.htm',
			controller:'noticiasCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Noticias'
			}
		})

		//############################################################################
		//############# **  MODULO POST CURSO ** ##########################################
		//############################################################################
		.state('user.cursos', {
			url: '/cursos',
			templateUrl: 'modulos/postcurso.htm',
			controller:'postcursoCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Curso'
			}
		})

		//############################################################################
		//############# **  MODULO UNIVERSIDADE ** ##########################################
		//############################################################################
		.state('user.universidade', {
			url: '/universidade',
		   templateUrl: 'modulos/universidade.htm',
			controller: 'universidadeCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Universidade'
			}
		})

		//############################################################################
		//############# **  MODULO CURSO ** ##########################################
		//############################################################################
		.state('user.curso', {
			url: '/curso',
			templateUrl: 'modulos/curso.htm',
            controller: 'cursoCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Curso'
			}
		})

		//############################################################################
		//############# **  MODULO OPORTUNIDADE ** ##########################################
		//############################################################################
		.state('user.oportunidade', {
			url: '/oportunidade',
			templateUrl: 'modulos/oportunidade.htm',
			controller:'oportunidadeCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Oportunidade'
			}
		})
		//############################################################################
		//############# **  MODULO USUARIO ** ##########################################
		//############################################################################
		.state('user.usuario', {
			url: '/usuario',
			templateUrl: 'modulos/usuario.htm',
			controller:'usuarioCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Usuario'
			}
		})
		//############################################################################
		//############# **  MODULO VEICULOS ** ##########################################
		//############################################################################
		.state('user.veiculo', {
			url: '/veiculo',
			templateUrl: 'modulos/veiculo.htm',
			controller:'veiculoCtrl',
			resolve: {
				function($sessionStorage, $location) {
					if (sessionStorage.getItem('usuario.token') == null) {
						$location.path('/login');
					}
				}

			},
			ncyBreadcrumb: {
				label: 'Veiculo'
			}
		})
	//############################################################################
				$urlRouterProvider.otherwise("/login");

});
