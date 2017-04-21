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
        //Verifica se o array está vazio, se sim retorna uma mensagem de errro
        //Caso contratio ele gera um objeto do tipo usuario e o armazena dentro de um array
        if($array == []){
            return ['message' => 'Por favor informe um usuário e senha', 'flag' => false];
        }else{
            $usuario = new Usuario();
            $usuario = $usuario->find("where emailUsuario='".$array['emailUsuario']."' AND senhaUsuario='".md5($array['senhaUsuario'])."' AND statusUsuario='ATIVO'");
            //Verifica se existe alguma coisa em $usuario
            if (!$usuario->idUsuario == null){
                $hash = md5($usuario->emailUsuario.time());
                apcu_add($hash, ['obj' => $usuario->toArray(), 'createAt' => date("Y-m-d H:i:s")]);
                $user = $usuario->toArray();
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
        if (apcu_exists($token)){
            return ['message' => 'Usuario está logado!', 'flag' => true, 'user' => apcu_fetch($token) ];
        }else{
            return ['message' => 'Usuario não está logado', 'flag' => false];
        }
    }
    /**
     * Retorna informação do usuario com o determinato Token
     * 
     * @param [type] $token
     * @return mixed
     */
    public static function _getTokenInfo($token){
        // Checa se o usuario está logado, se sim retorna as informações dele
        // se não retorna mensagem de erro
        if (self::_isLoggedIn($token)['flag']){
            return apcu_fetch($token);
        }else{
            return ['message' => 'Usuario não está logado', 'flag' => false];
        }
    }
}