app.service('restful', function ($http,$sessionStorage) {
 //Pegando Token
 var token = sessionStorage.getItem('usuario.token');

//REQUISICOES DO BACK-END CAMINHOS
   
   //Classes Usuario
<<<<<<< HEAD
   $usuarioLogin = '../dga/App/usuario/login'; // loga o usuario
   $usuarioSave =  '../dga/App/usuario/save'; // Salva Usuario
=======
   $usuarioLogin = 'App/usuario/login'; // loga o usuario
   $usuarioSave =  'App/usuario/save'; // Salva Usuario
>>>>>>> c7ee6b941a740754dd703bf3105716f1bd58d34e
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
        console.log(values);
        return  $http.post($usuarioLogin , values);
     
    };
   //Salva novo Usuario
    var _usuarioSave = function (values){
        return  $http.post($usuarioSave, values);
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
        usuarioSave: _usuarioSave,

        //Return do Cliente
        clienteSave : _clienteSave,
        clienteList : _clienteList,
        clienteListId : _clienteListId,

        //Return Estados e Cidades
        getEstados : _getEstados,
        getCidades : _getCidades
    }

});