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

      .state('user.modulolinks', {
      url: '/modulolinks',
      templateUrl: 'view/modulo/links.htm',
       ncyBreadcrumb: {
            label: 'Modulo'
         }
    })

      .state('user.modulolinks.subs', {
      url: '/sublink',
      templateUrl: 'view/modulo/modulo.html',
       ncyBreadcrumb: {
            label: 'Links Modulo'
         }
    })
    
    //Modulo de O.S
    .state('user.cadastro', {
      url: '/cadastro',
      templateUrl: 'view/modulo/cadastro.htm',
       ncyBreadcrumb: {
            label: 'O.S'
         }
    })
    //Cadastro de OS
    .state('user.cadastro.os', {
      url: '/cadastro/os',
      templateUrl: 'view/modulo/cadOs.htm',
      controller:'osCtrl',
       ncyBreadcrumb: {
            label: 'Cadastro de Tecnico'
         }
    })
    //Cadastro de Tecnico
    .state('user.cadastro.tecnico', {
      url: '/cadastro/tecnico',
      templateUrl: 'view/modulo/cadTecnico.htm',
      controller:'tecnicoCtrl',
       ncyBreadcrumb: {
            label: 'Cadastro de Tecnico'
         }
    })
    //Cadastro de Motivo
     .state('user.cadastro.problema', {
      url: '/cadastro/problema',
      templateUrl: 'view/modulo/cadProblema.htm',
      controller:'problemaCtrl',
       ncyBreadcrumb: {
            label: 'Cadastro de Problema'
         }
    })
     //Cadastro de Servico
     .state('user.cadastro.servico', {
      url: '/cadastro/servico',
      templateUrl: 'view/modulo/cadServico.htm',
      controller:'servicoCtrl',
       ncyBreadcrumb: {
            label: 'Cadastro de Servico'
         }
    })
    //###########################################
    //Modulo de O.S
    .state('user.consulta', {
      url: '/consulta',
      templateUrl: 'view/modulo/consulta.htm',
       ncyBreadcrumb: {
            label: 'O.S'
         }
    })
    //Consulta de OS
    .state('user.consulta.os', {
      url: '/consulta/os',
      templateUrl: 'view/modulo/conOs.htm',
      controller:'osCtrl',
       ncyBreadcrumb: {
            label: 'Consulta de Tecnico'
         }
    })
    //Consulta de Tecnico
    .state('user.consulta.tecnico', {
      url: '/consulta/tecnico',
      templateUrl: 'view/modulo/conTecnico.htm',
      controller:'tecnicoCtrl',
       ncyBreadcrumb: {
            label: 'Consulta de Tecnico'
         }
    })
    //Consulta de Motivo
     .state('user.consulta.problema', {
      url: '/consulta/problema',
      templateUrl: 'view/modulo/conProblema.htm',
      controller:'problemaCtrl',
       ncyBreadcrumb: {
            label: 'Consulta de Problema'
         }
    })
     //Consulta de Servico
     .state('user.consulta.servico', {
      url: '/consulta/servico',
      templateUrl: 'view/modulo/conServico.htm',
      controller:'servicoCtrl',
       ncyBreadcrumb: {
            label: 'Consulta de Servico'
         }
    })
    //################################################
     .state('user.agendamento', {
      url: '/consulta',
      templateUrl: 'view/modulo/agendamento.htm',
       ncyBreadcrumb: {
            label: 'Agendamento'
         }
    })
    //Agendamento de OS
    .state('user.agendamento.os', {
      url: '/agendamento/os',
      templateUrl: 'view/modulo/agenOs.htm',
      controller:'osCtrl',
       ncyBreadcrumb: {
            label: 'Agendamento de O.S'
         }
    })

    
  $urlRouterProvider.otherwise("/login");



});