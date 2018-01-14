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
     * @param Request $request
     * @param Response $response
     * @param Argumento $args
     * @return void
     */
    public function checkLogin($request, $response, $args){
        $token = $args['token'];
        return $response->withJson(Auth::_getTokenInfo($token));
    }
    /**
     * Verifica e faz login se o usuario tiver conta do facebook vinculada ao Imobiliar
     * 
     * @param Request $request
     * @param Response $response
     * @param Argumento $args
     * @return void
     */
    public function facebookLogin($request, $response, $args){
       $post = json_decode($request->getBody(),true);
       $usuario = UsuarioController::checkFaceLogin($post);
       $usuario['token'] = $post['accessToken'];
       return $response->withJson($usuario);
    }
    /**
     * Função para recuperação e envio de senha para o email cadastrado de senha
     * 
     * @param Request $request
     * @param Response $response
     * @param Argumento $args
     * @return void
     */
    public function forgotPass($request, $response, $args){
        $post = json_decode($request->getBody(),true);
        $usuario = UsuarioController::forgot($post['email']);
        $usuario->setPrimaryKey('idUsuario');
        if ($usuario->idUsuario == null){
            return 
            [
                'flag' => false,
                'message' => 'O Email informado não está cadastrado na nossa base de dados'
            ];

        }else{ 
            //Gera Nova Senha e atualiza
            $newPass = rand(4000, 10000000000);
            $usuario->senhaUsuario = md5($newPass);    
            $usuario->update();
            // Corpo do email
            $body =
            "Olá Sr ".$usuario->nomeUsuario.' '.$usuario->sobrenomeUsuario."<br>
            Sua Senha foi modificada.<br>
            Sua nova senha é : $newPass";
            // Fim do corpo do email
            $mail = new MailController();
            $mail->makeEmail($usuario->emailUsuario, $usuario->nomeUsuario.' '.$usuario->sobrenomeUsuario, 'Recuperação de Senha', $body);
            return $response->withJson($mail->send());
       }
    }
}