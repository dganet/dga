app.service('restful', function ($http,$sessionStorage) {
 //Pegando Token
 var token = sessionStorage.getItem('usuario.token');

//REQUISICOES DO BACK-END CAMINHOS

   //Classes Usuario
<<<<<<< HEAD
   $usuarioLogin = '/dga/App/usuario/login'; // loga o usuario
   $usuarioLoginFB = 'App/usuario/login/facebook'; // loga o usuario Plugin Facebook
=======
   $usuarioLogin = '../App/usuario/login'; // loga o usuario
>>>>>>> e5208f0d59ee5169ce3292e2349786e3e53f6bef
   $usuarioSave =  'App/usuario/save'; // Salva Usuario
   //Classes Cliente
   $noticiaSave = '../App/post/save/'; // Salva Cliente
   $clienteList = 'App/cliente/list'; // Lista todos os Cliente referente ao id do Usuario
   $clienteListId = 'App/cliente/listId/'; // Lista unico cliente referente ao ID + token
   //MODULO PEFIL
   $updatePicture = 'App/imagem'; //Update Foto


//|#######################################################|
//|############# **  MODULO USUARIOS ** ##################|
//|#######################################################|

   //Logando
    var _usuarioLogin = function (values){
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
    var _noticiaSave = function (values){
      console.log(values);
        return  $http.post($noticiaSave + token , values);
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
//|############# **  MODULO PERFIL ** ################|
//|#######################################################|

   //Update Picture
    var _updatePicture = function (values){
        return  $http.put($updatePicture + token , values);
    };

//|#######################################################|
//|############# **  RETURNS ** ##########################|
//|#######################################################|

    return {
        //Return do Usuario
        usuarioLogin : _usuarioLogin,
        usuarioSave: _usuarioSave,

        //Return do Cliente
        noticiaSave : _noticiaSave,
        clienteList : _clienteList,
        clienteListId : _clienteListId,

        //Return Modulo Cliente
        updatePicture : _updatePicture,
    }

});