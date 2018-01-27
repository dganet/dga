<?php
namespace Api\Controller;
use Api\Model\Entity\Usuario;
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
        if ($auth['flag']){
            unset($auth['flag']);
            return $response->withJson($auth);
       }else{
            return $response->withJson($auth);
       }
    }
    /**
     * Função para deslogar e quebrar a sessão
     * @param Request $request
     * @param Response $response
     * @param Argumento $args
     * @return void
    */
    public function deslogar($request, $response, $args){
        $post = json_decode($request->getBody(), true);
        $cache = new Cache();
        return $response->withJson($cache->delete($post['token']));
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
            $cod = 'F'.rand(4000, 10000000000);
            $cache = new Cache();
            $cache->save($cod, json_encode($usuario));
            // Corpo do email
            $body =
            "Olá Sr(a) ".$usuario->nomeUsuario.' '.$usuario->sobrenomeUsuario." <br>
            foi feita uma solicitação de mudañça de senha, caso não tenha sido solicitada por você favor desconsiderar.<br>
            Acesse o link e digite o seguinte codigo para poder fazer a troca de senha.
            Código: $cod

            http://localhost/dga/#/site/forget" 
            ;
            // Fim do corpo do email
            $mail = new MailController();
            $mail->makeEmail($usuario->emailUsuario, $usuario->nomeUsuario.' '.$usuario->sobrenomeUsuario, 'Recuperação de Senha', $body);
            return $response->withJson($mail->send());
       }
    }
    /**
     * Função para mudar a senha do usuario e apagar o arquivo de cache
    */
    public function changeForgot($request, $response, $args){
        $post = json_decode($request->getBody(), true);
        $cache = Auth::_getTokenInfo($post['codigo']);
        $usuario = Usuario::getInstance();
        $usuario->load(json_decode($cache['conteudo']));
        $usuario->setPrimaryKey('idUsuario');
        $usuario->senhaUsuario = md5($post['senha']);
        if($usuario->update()){
            $cache = new Cache();
            $cache->delete($post['codigo']); 
        }    
    }
    /**
     * Função para verificar se o codigo que o usuario é valido
    */
    public function checkForgot($request, $response, $args){
        $post = json_decode($request->getBody(), true);
        $cache = Auth::_getTokenInfo($post['codigo']);
        if(isset($cache['conteudo'])){
            return $response->withJson(['flag' => true]);
        }else{
            return $response->withJson(['flag' => false]);
        }
    }
}