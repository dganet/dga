<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario;
class Auth{
    private static $_token;

    public function __construct(){
        $this->_token = apc_fetch('token');
    }
    public function login(Array $array = []){
        if($array == []){
            return ['message' => 'Por favor informe um usuário e senha', 'flag' => false];
        }else{
            $usuario = new Usuario();
            $usuario = $usuario->find('where emailUsuario='.$array['emailUsuario'].' AND senhaUsuario='.md5($array['senhaUsuario']));
            if (!usuario == null){
                $hash = md5($usuario->nomeUsuario.time());
                if (array_key_exists($hash, $this->_token)){
                    return ['message' => 'Usuário já está logado!', 'flag' => false];
                }else{
                    $this->_token[$hash] = ['obj' => $usuario, 'createAt' => date("Y-m-d H:i:s")];
                }
            }
        }
    }
    public function isLoggedIn($token){
        if (array_key_exists()){
            return true;
        }else{

        }
    }
    public static function _getToken(){

    }
    public function setToken(){

    }
}