app.service('restful', function ($http,$sessionStorage) {
 //Pegando Token
 var token = sessionStorage.getItem('usuario.token');

//REQUISICOES DO BACK-END CAMINHOS
   
   //Classes Usuario
   $usuarioLogin = 'App/usuario/login'; // loga o usuario
   $usuarioLoginFB = 'App/usuario/login/facebook'; // loga o usuario Plugin Facebook
   $usuarioSave =  'App/usuario/save'; // Salva Usuario
   $usuarioSaveMigraFB =  'App/usuario/'; // Migra usuário com Dados do Facebook

   //Classes Cliente
   $clienteSave = 'App/cliente/save'; // Salva Cliente
   $clienteList = 'App/cliente/list'; // Lista todos os Cliente referente ao id do Usuario
   $clienteListId = 'App/cliente/listId/'; // Lista unico cliente referente ao ID + token
   //Classes Estados e Cidades
  

//|#######################################################|
//|############# **  MODULO USUARIOS ** ##################|
//|#######################################################|

   //Logando
    var _usuarioLogin = function (values){
        return  $http.post($usuarioLogin , values);
    };
   //Logando Via Facebbok
    var _usuarioLoginFB= function (values){
        return  $http.post($usuarioLoginFB , {'userId': values});
     
    };
   //Salva novo Usuario
    var _usuarioSave = function (values){
        return  $http.post($usuarioSave, values);
    };
   //Migra Usuario com Dados do Facebook
    var _usuarioSaveMigraFB = function (values){
        return  $http.put($usuarioSaveMigraFB, values);
    };

//|#######################################################|
//|############# **  MODULO CLIENTE ** ###################|
//|#######################################################|
   //Inseri novo Cliente
    var _clienteSave = function (values){
        return  $http.post($clienteSave + token , values);
    };
   //Lista todos os Clientes
    var _clienteList = function (dados){
        return  $http.get($clienteList + token);
    };
   //Lista informação de apenas um cliente referente ao ID 
    var _clienteListId = function (id){
        return  $http.get($clienteListId + id + '/'+ token );
    };

//|#######################################################|
//|############# **  ESTADOS / CIDADES ** ################|
//|#######################################################|

   //Lista todos os Estados
    var _getEstados = function (dados){
        return  $http.get('');
    };
   //Lista todas as Cidades
    var _getCidades = function (dados){
        return  $http.get('');
    };
//|#######################################################|
//|############# **  RETURNS ** ##########################|
//|#######################################################|
   
    return {
        //Return do Usuario
        usuarioLogin : _usuarioLogin,
        usuarioLoginFB : _usuarioLoginFB,
        usuarioSave: _usuarioSave,
        usuarioSaveMigraFB: _usuarioSaveMigraFB,

        //Return do Cliente
        clienteSave : _clienteSave,
        clienteList : _clienteList,
        clienteListId : _clienteListId,

        //Return Estados e Cidades
        getEstados : _getEstados,
        getCidades : _getCidades
    }

});