app.service('restful', function ($http,$sessionStorage) {
 //Pega o id do usuario logado
 var token = sessionStorage.getItem('usuario.id');

//REQUISICOES DO BACK-END CAMINHOS

   //Classes Usuario
   $usuarioLogin = '../App/usuario/login'; // loga o usuario
   $usuarioSave =  '/App/usuario/save'; // Salva Usuario

   //Classes Associado
   $associadoSave = '../App/associado/save/'; // Salva Associado
   $clienteList = '/App/cliente/list'; // Lista todos os Cliente referente ao id do Usuario

    //Classes Universidade
   $universidadeSave = '../App/universidade/save'; // Salva Associado
   $universidadeList = '../App/universidade/list'; // Lista todas Universades
   $universidadeListId = '../App/universidade/list/';// Lista Universidade referente ao ID
   $universidadePut = '../App/universidade/update/';// Uptades na Universidade
   $universidadeDel = '../App/universidade/delete/';// Universidade Deleta

   //Classes Cliente
   $noticiaSave = '/App/post/save/'; // Salva Cliente
   $clienteList = '/App/cliente/list'; // Lista todos os Cliente referente ao id do Usuario
   $clienteListId = '/App/cliente/listId/'; // Lista unico cliente referente ao ID + token
   //MODULO PEFIL
   $updatePicture = '/App/imagem'; //Update Foto


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
//|############# **  MODULO ASSOCIADOS ** ###################|
//|#######################################################|
   //Inseri novo Cliente
    var _associadoSave = function (values){
        return  $http.post($associadoSave + token , values);
    };

//|#######################################################|
//|############# **  MODULO UNIVERSIDADE ** ###################|
//|#######################################################|
   //Inseri nova Universiade
    var _universidadeSave = function (values){
        return  $http.post($universidadeSave , values);
    };
    //Lista todas Universidades
    var _universidadeList = function (values){
        return  $http.get($universidadeList);
    };
    //Lista Universidade referente ao ID
    var _universidadeListId = function (id){
          return  $http.get($universidadeListId + id);
    };
    //Update de Universidade
    var _universidadePut = function (id , values){
          return  $http.put($universidadePut + id , values);
    };
    //Update de Universidade
    var _universidadeDel = function (values){
      console.log(values);
          return  $http.del($universidadeDel + token , values);
    };
//|#######################################################|
//|############# **  MODULO NOTICIAS ** ###################|
//|#######################################################|
   //Inseri novo Cliente
    var _noticiaSave = function (values){
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
        //Return do Associado
        associadoSave : _associadoSave,
        //Return da Universidade
        universidadeSave : _universidadeSave,
        universidadeList : _universidadeList,
        universidadeListId : _universidadeListId,
        universidadePut : _universidadePut,
        universidadeDel : _universidadeDel,
        //Return do Cliente
        noticiaSave : _noticiaSave,
        clienteList : _clienteList,
        clienteListId : _clienteListId,

        //Return Modulo Cliente
        updatePicture : _updatePicture,
    }

});