<?php
namespace App\Controller;
use \App\Model\Entity\Usuario;
class Auth
{

	public static $token;
	private $encrypt;
	private $auth;

	public function login($data){
		$usuario = new Usuario($data);
		$usuario->status = "ATIVO";
		$r = $usuario->select(array("email", "AND", "senha", "AND", "status"));
		if ($r){
			$this->auth = $r;
			$this->encrypt = sha1($usuario->email.$usuario->senha);
			$this->loadToken();
			$this->auth[0]['token'] = $this->encrypt;
			return $this->auth;
		}else{
			return array('login' => false);
		}
	}

	public function loadToken(){
		$this->getToken();
		self::$token[$this->encrypt] = $this->auth;
		$file = fopen(__DIR__."/tmp/serial", "w");
		fwrite($file, json_encode(self::$token));
		fclose($file);
	}

	public function getToken(){
		$array = file(__DIR__."/tmp/serial");
		self::$token = json_decode($array[0], true);
	}
	

}