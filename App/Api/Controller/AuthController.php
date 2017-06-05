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
        var_dump($post);
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
}