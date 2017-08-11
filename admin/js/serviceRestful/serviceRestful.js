app.service('restful', function ($http,$sessionStorage) {
 //Pega o id do usuario logado
 var token = sessionStorage.getItem('usuario.id');

//REQUISICOES DO BACK-END CAMINHOS

   //Classes Usuario
   $usuarioLogin = '../App/usuario/login'; // loga o usuario
   $usuarioSave =  '/App/usuario/save'; // Salva Usuario

    //Classes associado
   $associadoSave = '../App/associado/save'; // Salva Associado
   $associadoList = '../App/associado/list'; // Lista todo Associados
   $associadoListId = '../App/associado/list/';// Lista associado referente ao ID
   $associadoPut = '../App/associado/update/';// Uptades na associado
   $associadoDel = '../App/associado/delete/';// associado Deleta

    //Classes Universidade
   $universidadeSave = '../App/universidade/save'; // Salva Universidade
   $universidadeList = '../App/universidade/list'; // Lista todas Universades
   $universidadeListId = '../App/universidade/list/';// Lista Universidade referente ao ID
   $universidadePut = '../App/universidade/update/';// Uptades na Universidade
   $universidadeDel = '../App/universidade/delete/';// Universidade Deleta

   //Classes Curso
   $cursofaculdadeSave = '../App/cursofaculdade/save'; // Salva Curso
   $cursofaculdadeList = '../App/cursofaculdade/list'; // Lista todas os Cursos
   $cursofaculdadeListId = '../App/cursofaculdade/list/';// Lista curso referente ao ID
   $cursofaculdadePut = '../App/cursofaculdade/update/';// Uptades no curso
   $cursofaculdadeDel = '../App/cursofaculdade/delete/';// Curso Deleta
    
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
//|############# **  MODULO ASSOCIADO ** ###################|
//|#######################################################|
   //Inseri nova Universiade
    var _associadoSave = function (values){
        return  $http.post($associadoSave , values);
    };
    //Lista todas associados
    var _associadoList = function (values){
        return  $http.get($associadoList);
    };
    //Lista associado referente ao ID
    var _associadoListId = function (id){
          return  $http.get($associadoListId + id);
    };
    //Update de associado
    var _associadoPut = function (id , values){
          return  $http.put($associadoPut + id , values);
    };
    //Update de associado
    var _associadoDel = function (values){
          return  $http.delete($associadoDel + values);
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
          return  $http.delete($universidadeDel + values);
    };
//|#######################################################|
//|############# **  MODULO CURSO ** ###################|
//|#######################################################|
   //Inseri nova Curso
    var _cursofaculdadeSave = function (values){
        return  $http.post($cursofaculdadeSave , values);
    };
    //Lista todas Curso
    var _cursofaculdadeList = function (values){
        return  $http.get($cursofaculdadeList);
    };
    //Lista Curso referente ao ID
    var _cursofaculdadeListId = function (id){
          return  $http.get($cursofaculdadeListId + id);
    };
    //Update de Curso
    var _cursofaculdadePut = function (id , values){
          return  $http.put($cursofaculdadePut + id , values);
    };
    //Update de Curso
    var _cursofaculdadeDel = function (values){
          return  $http.delete($cursofaculdadeDel + values);
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
        //Return da Associado
        associadoSave : _associadoSave,
        associadoList : _associadoList,
        associadoListId : _associadoListId,
        associadoPut : _associadoPut,
        associadoDel : _associadoDel,
        //Return da Universidade
        universidadeSave : _universidadeSave,
        universidadeList : _universidadeList,
        universidadeListId : _universidadeListId,
        universidadePut : _universidadePut,
        universidadeDel : _universidadeDel,
        //Return da Universidade
        cursofaculdadeSave : _cursofaculdadeSave,
        cursofaculdadeList : _cursofaculdadeList,
        cursofaculdadeListId : _cursofaculdadeListId,
        cursofaculdadePut : _cursofaculdadePut,
        cursofaculdadeDel : _cursofaculdadeDel,
        //Return do Cliente
        noticiaSave : _noticiaSave,
        clienteList : _clienteList,
        clienteListId : _clienteListId,

        //Return Modulo Cliente
        updatePicture : _updatePicture,
    }

});