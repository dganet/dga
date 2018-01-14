<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario;
class Auth{
    /**
     * Contrutor da classe
     */
    public function __construct(){
    }

    /**
     * Função para fazer o login na aplicação
     *
     * @param Array $array
     * @return void
     */
    public function login(Array $array = []){
        $cache = new Cache();
        //Verifica se o array está vazio, se sim retorna uma mensagem de errro
        //Caso contratio ele gera um objeto do tipo usuario e o armazena dentro de um array
        if($array == []){
            return ['message' => 'Por favor informe um usuário e senha', 'flag' => false];
        }else{
            $usuario = Usuario::getInstance();
            $usuario->makeSelect()->where("emailUsuario='".$array["emailUsuario"]."'")->and("senhaUsuario='".md5($array['senhaUsuario'])."'")->and("statusUsuario='ATIVO'");
            $usuario = $usuario->execute()->get(0);
            //Verifica se existe alguma coisa em $usuario
            if (!$usuario->idUsuario == null){
                $hash = md5($usuario->emailUsuario."|".time());
                $cache->save($hash,  $usuario);
                $user = (array)$usuario;
                $user['token'] = $hash;
                $user['flag'] = true;
                return $user;
               
            }else{
               
                return ['message' => 'Email ou Senha incorretos', 'flag' => false];
            }
        }
    }
    /**
     * Verifica se o usuario está logado a partir do token
     *
     * @param Hash $token
     * @return mixed
     */
    public static function _isLoggedIn($token){
        $cache = new Cache();
        $user = $cache->read($token);
        if (!$user == false){
           return true;
        }else{
            return false;
        }
    }
    /**
     * Retorna informação do usuario com o determinato Token
     *
     * @param [type] $token
     * @return mixed
     */
    public static function _getTokenInfo($token){
        $cache = new Cache();
         $user = $cache->read($token);
        // Checa se o usuario está logado, se sim retorna as informações dele
        // se não retorna mensagem de erro
        if (!$user == false){
            return $user;
        }else{
            return ['message' => 'Usuario não está logado', 'flag' => false, 'user' => $user];
        }
        return $user;
    }
}
