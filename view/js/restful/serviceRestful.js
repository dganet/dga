app.service('restful', function ($http,$sessionStorage) {
 //Pegando Token
 var token = sessionStorage.getItem('usuario.token');

//REQUISICOES DO BACK-END 
   
   //Classes Usuario
   $usuarioLogin = '../App/usuario/login';
   $usuarioSave =  '../App/usuario/save';
   //Classes Cliente
   $clienteSave = '../App/cliente/save';
   $clienteList = '../App/cliente/list';
  

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
    var _postCliente = function (values){
        return  $http.post('App/cliente/save/'+ token , values);
    };
   //Lista todos os Clientes
    var _getClientes = function (dados){
        return  $http.get('App/cliente/list/' + token);
    };
   //Lista informação de apenas um cliente referente ao ID 
    var _getCliente = function (id){
        return  $http.get('App/cliente/listId/'+ id + '/'+ token );
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
        postCliente : _postCliente,
        getClientes : _getClientes,
        getCliente : _getCliente,
        getEstados : _getEstados,
        getCidades : _getCidades
    }

});