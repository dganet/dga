<?php
namespace App\Api\Controller;

class Auth {
	private $token;

	/**
	* @param $data Array - Informações para fazer login
	*/
	public function login($data){

		//Se a posição email existir, logo é um usuario
		if(isset($data['email'])){
			$usuario = new \Api\Model\Usuairo();
			$flag =  $usuario->select(array('where' => array(
								'AND' => array(
										'email'  => $data['login'],
										'senha'  => md5($data['senha']),
										'status' => 'ATIVO'
												)
									)
								)
							);
		}
		// Se a posião cpf existir, logo é um associado
		if(isset($data['cpf'])){
			$associado = new \Api\Model\Associado();
			$flag =  $associado->select(array('where' => array(
								'AND' => array(
										'cpf' => $data['cpf'],
										'senha' => md5($data['senha']),
										'status' => 'ATIVO'
												)
									)
								)
							);
		}



	}
}