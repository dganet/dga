app.service('restful', function ($http,$sessionStorage) {
 //Pegando Token
 var token = sessionStorage.getItem('usuario.token');

//REQUISICOES DO FRONT-END TO BACK-END

  //CAMINHOS

   //Classes Usuario
   $usuarioLogin = 'App/usuario/login'; // loga o usuario
   $usuarioLoginFB = 'App/usuario/login/facebook'; // loga o usuario Plugin Facebook
   $usuarioSave =  'App/usuario/save'; // Salva Usuario
   $usuarioSaveMigraFB =  'App/usuario/migrate'; // Migra usuário com Dados do Facebook

   //Classes Cliente
   $clienteSave = 'App/cliente/save/'; // Salva Cliente
   $clienteList = 'App/cliente/list/'; // Lista todos os Cliente referente ao id do Usuario
   $clienteListId = 'App/cliente/listId/'; // Lista unico cliente referente ao ID + token
   $clientePut = 'App/cliente/update/'; // Lista unico cliente referente ao ID + token
   $clienteDel = 'App/cliente/delete/'; // Lista unico cliente referente ao ID + token

   //Classes Imovel
   $imovelSave = 'App/imovel/save/'; // Salvar Imovel
   $imovelList =  'App/imovel/list/'; // Lista os Imoveis do Cliente
   $imovelListiIdProprietario = 'App/proprietario/list/' //Retorna alguns dados do Proprietário do Imovel
   $imovelUpdateProprietario = 'App/proprietario/update/' // Atualiza dados do Proprietario referente o id do imovel
   $imovelListiIdEndereco = 'App/endereco/' //Retorna alguns dados do Endereco do Imovel referete ao id
   $imovelUpdateEndereco = 'caminho do back-end' // Atualiza dados do Endereco referente o id do imovel
   $imovelListiIdImovel = 'App/imovel/listId/' //Retorna alguns dados do Imovel referente ao id
   $imovelUpdateImovel = 'caminho do back-end' // Atualiza dados do imovel referente o id do imovel
   $imovelListiIdFotos = 'App/imagem/listId/' //Retorna alguns dados das Fotos referente ao id
   $imovelUpdateFotos = 'App/imagem/update/' // Atualiza dados das Fotos referente o id do imovel
   $imovelListFiltro = 'caminho do back-end' // Filtro do loop de Imoveis

   //Classes Corretor
   $corretorListImovel = 'caminho do back-end'// Lista os Imoveis Publico de um determinado corretor atraves da url
   $corretorListDados = 'caminho do back-end' // Pega os dados do corretor atraves da URL

   //MODULO PEFIL
   $checkURL = 'CAMINHO PARA BACK-END'; //Verifica se Existe essa URL
   $updateURL = 'CAMINHO PARA BACK-END'; //Update URL
   $updatePicture = 'CAMINHO PARA BACK-END'; //Update Foto
   $updatePessoal = 'CAMINHO PARA BACK-END'; //Update Dados Pessoais
   $updateSenhaPerfil = 'App/usuario/update/'; //Update Dados Pessoais


   // Resgate Senha e Update Senha
   $solicitaResgateSenha = 'App/usuario/login/forgot'; // Envia o Email para Solicitação do Codigo de recuperacao de Senha
   $resgateSenha = 'App/usuario/login/forgot/check'; // Envia o Codigo para o Back End verificar se existe um resgate Senha
   $updateSenha = 'App/usuario/login/forgot/change'; // Envia a senha atualiza e o e-mail
   // Logout Sistema
   $logout = 'App/usuario/logout' // Mando o Token para o Back-End para quebrar a Sessão




//|#######################################################|
//|############# **  MODULO USUARIOS ** ##################|
//|#######################################################|

   //Logando
    var _usuarioLogin = function (values){
        return  $http.post($usuarioLogin , values);
    };
   //Logando Via Facebbok
    var _usuarioLoginFB= function (values){
        return  $http.post($usuarioLoginFB , values);

    };
   //Salva novo Usuario
    var _usuarioSave = function (values){
      console.log(values);
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
    var _clienteSave = function (values, token){
        return  $http.post($clienteSave + token , values);
    };
   //Lista todos os Clientes
    var _clienteList = function (token){
        return  $http.get($clienteList + token);
    };
   //Lista informação de apenas um cliente referente ao ID
    var _clienteListId = function (id){
        return  $http.get($clienteListId + id);
    };
    //Atualiza as informações do Cliente
    var _clientePut = function (values, token){
        return  $http.put($clientePut + token , values);
    };
    //Inativa o Cliente
    var _clienteDel = function (values,token){
        return  $http.delete($clienteDel + values + '/' + token);
    };
//|#######################################################|
//|############# **  MODULO IMOVEL ** ###################|
//|#######################################################|
   //Inseri novo Imovel
    var _imovelSave = function (values, token){

        return  $http.post($imovelSave + sessionStorage.getItem('usuario.token'), values);
    };
   //Lista todos imoveis do cliente
    var _imovelList = function (token){
        return  $http.get($imovelList + token);
    };
   //Lista dados do imovel por id do cliente
   var _imovelListiIdProprietario = function (id,token){
       console.log(id);
       console.log(token);
    return  $http.get($imovelListiIdProprietario + id + '/' + token);
    };
   //Atualiza os dados do Proprietario referente ao id do imovel
   var _imovelUpdateProprietario = function (id,token,proprietario){
       console.log(id);
       console.log(token);
       console.log(proprietario);
    return  $http.put($imovelUpdateProprietario + id + '/' + token , proprietario);
    };
   //Lista dados do endereco por id do cliente
   var _imovelListiIdEndereco = function (fkEndereco,token){
    console.log(fkEndereco);
    console.log(token);
 return  $http.get($imovelListiIdEndereco + fkEndereco + '/' + token);
 };
//Atualiza os dados do Endereco referente ao id do imovel
var _imovelUpdateEndereco = function (id,token,endereco){
    console.log(id);
    console.log(token);
    console.log(endereco);
 return  $http.put($imovelUpdateEndereco + id + '/' + token , endereco);
 };
    //Lista dados do imovel por id do imovel
    var _imovelListiIdImovel = function (id,token){
        console.log(id);
        console.log(token);
     return  $http.get($imovelListiIdImovel + id + '/' + token);
     };
    //Atualiza os dados do Endereco referente ao id do imovel
    var _imovelUpdateImovel = function (id,token,imovel){
        console.log(id);
        console.log(token);
        console.log(endereco);
     return  $http.put($imovelUpdateImovel + id + '/' + token , imovel);
     };
    //Lista fotos do imovel por id do imovel
    var _imovelListiIdFotos = function (id,token){
        console.log(id);
        console.log(token);
     return  $http.get($imovelListiIdFotos + id + '/' + token);
     };
    //Atualiza os dados do Endereco referente ao id do imovel
    var _imovelUpdateFotos = function (id,token,fotos){
        console.log(id);
        console.log(token);
        console.log(fotos);
     return  $http.put($imovelUpdateFotos + id + '/' + token , fotos);
     };

     var _imovelListFiltro = function(filtro,token){
         return $http.get($imovelListFiltro + '/' + token , filtro)
     }
//|#######################################################|
//|############# **  MODULO CORRETOR ** ################|
//|#######################################################|
   //List Imovel do Corretor
   var _corretorListImovel = function (values){
    //console.log(values,token);
     return  $http.get($corretorListImovel, values);
 };
    //Listar Dados do Corretor
   var _corretorListDados = function (values){
    //console.log(values,token);
     return  $http.get($corretorListDados, values);
 };



//|#######################################################|
//|############# **  MODULO PERFIL ** ################|
//|#######################################################|
   //Check URL
   var _checkURL = function (values ,token){
    //console.log(values,token);
     return  $http.get($checkURL + token , values);
 };
   //Update Picture
   var _updateURL = function (values ,token){
    //console.log(values,token);
     return  $http.put($updateURL + token , values);
 };
   //Update Picture
    var _updatePicture = function (values ,token){
       //console.log(values,token);
        return  $http.put($updatePicture + token , values);
    };

       //Update Dados Pessoais
    var _updatePessoal = function (values ,token){
        return  $http.put($updatePessoal + token , values);
    };
       //Update Senha no Pergil
    var _updateSenhaPerfil = function (values ,token){
        return  $http.put($updateSenhaPerfil + token , values);
    };

//|#######################################################|
//|############# **  RESGATE SENHA ** ################|
//|#######################################################|
    //Recuperação de Senha
    var _solicitaResgateSenha = function (values){
     // console.log(values);
        return $http.post($solicitaResgateSenha , values);
    };
   //Solicita o Codigo da Recuperacao de Senha
    var _resgateSenha = function (values){
        return  $http.post($resgateSenha, values);
    };
    //Atualiza a Senha
    var _updateSenha = function (values){
      console.log(values);
        return $http.put($updateSenha , values);
    };

//|#######################################################|
//|################### **  LOGOUT ** #####################|
//|#######################################################|
    //Logout do Sistema
    var _logout = function (values){
        return $http.post($logout , values);
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
        clientePut : _clientePut,
        clienteDel : _clienteDel,

        //Return do Imovel
        imovelSave : _imovelSave,
        imovelList : _imovelList,
        imovelListiIdProprietario : _imovelListiIdProprietario,
        imovelUpdateProprietario : _imovelUpdateProprietario,
        imovelListiIdEndereco : _imovelListiIdEndereco,
        imovelUpdateEndereco : _imovelUpdateEndereco,
        imovelListiIdImovel : _imovelListiIdImovel,
        imovelUpdateImovel : _imovelUpdateImovel,
        imovelListiIdFotos : _imovelListiIdFotos,
        imovelUpdateFotos : _imovelUpdateFotos,

        //Corretor
        corretorListImovel: _corretorListImovel,
        corretorListDados: _corretorListDados,
        //Return Busca o Filtro
        imovelListFiltro : _imovelListFiltro,

        //Return Perfil
        updatePicture : _updatePicture,
        updatePessoal : _updatePessoal,
        updateSenhaPerfil : _updateSenhaPerfil,
        checkURL : _checkURL,
        updateURL : _updateURL,

        //Return Resgate Senha e Update da Senha
        solicitaResgateSenha : _solicitaResgateSenha,
        resgateSenha : _resgateSenha,
        updateSenha : _updateSenha,

        //Return do Logout
        logout : _logout,
    }

});
