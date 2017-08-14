app.service('servmsg', function ($scopo ,$timeout) {

   //Logando
    var _mensagem = function (values){
      //Exibe a Mensagem
      $scope.mensagem = false;

      if (values == sucesso){
              
              // Depois de 5 segundos some a mensagem
              $timeout(function () {
                   $scope.mensagem = true;
               },5000);

        return msg = 'mensagem sucesso';
      } ;  

    };
//|#######################################################|
//|############# **  RETURNS ** ##########################|
//|#######################################################|

    return {

        //Return Modulo Cliente
        mensagem : _mensagem,
    };

});
