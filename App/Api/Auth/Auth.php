<?php
namespace Api\Auth;
use \Api\Auth\Cache;
class Auth{
    /**
     * Variavel que irá armazenar o token do usuario
     *
     * @var String
     */
    private $token;
    /**
     * Local de armazenamento do path onde será armazenado o arquivo de token
     *
     * @var String
     */
    private $tmpPath;
    /**
     * Loga um usuario/associado conforme as informações passadas no username e password
     *
     * @param String $username
     * @param String $password
     * @param Boolean $isAssoc
     * @return Boolean
     */
    public function login($username,$password, $isAssoc){
        $cache = new Cache();
        /**
         * Verifica se um associado
         */
        if ($isAssoc){
            $associado = \Api\Model\Entity\Associado::getInstance();
        }else{
            $usuario = \Api\Model\Entity\Usuario::getInstance();
            $usuario->makeSelect()->where("email='".$username."'")
                ->and("senha='".md5($password)."'")->and("status='ATIVO'");
            $collection = $usuario->execute();
            /**
             * Verifica se alguma coisa foi retornada
             */
            if($collection->length()> 0 ){
                $hash = md5($collection->get(0)->email."|".time());
                $cache->save($hash, $collection->get(0)); 
                return ['token' => $hash, 'user' => $collection->get(0), 'flag' => true];
            }else{
                return ['flag' => false, 'message' => 'Usuario ou senha invalidos'];
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