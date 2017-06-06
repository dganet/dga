<?php
namespace Api\Controller;

class AuthController{

    /**
     * Loga o usuario
     * 
     * @param Request $request
     * @param Response $response
     * @param Argumento $args
     * @return void
     */
    public function logar($request, $response, $args){
        $post = json_decode($request->getBody(), true);
        $auth =  new Auth();
        $auth = $auth->login($post);
        if ($auth[flag]){
            unset($auth['flag']);
            return $response->withJson($auth);
       }else{
            return $response->withJson($auth);
       }
    }
    /**
     * Checa se há um usuario logado com um determinato token
     * 
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return void
     */
    public function checkLogin($request, $response, $args){
        $token = $args['token'];
        return $response->withJson(Auth::_getTokenInfo($token));
    }
    
    public function facebookLogin($request, $response, $args){
        $post = json_decode($request->getBody(), true);
        var_dump($post);
    }
    public function forgotPass($request, $response, $args){
        $post = json_decode($request->getBody(),true);
        $usuario = UsuarioController::forgot($post);
        if ($usuario->idUsuario == null){
            return 
            [
                'flag' => false,
                'message' => 'O Email informado não está cadastrado na nossa base de dados'
            ];

        }else{
            //Gera Nova Senha e atualiza
            $newPass = rand(4000, 10000000000);
            $usuario->senhaUsuario = $newPass;
            $usuario->update();
            //Envia Email informando a nova senha
            require "MailController.php";
            forgotEmail($newPass, $usuario->nomeUsuario." ".$usuario->sobrenomeUsuario, $usuario->emailUsuario);
            return 
            [
                'flag'    => true,
                'message' => 'Senha modificada com sucess, nova senha enviada para o email cadastrado'
            ];
        }
    }
}