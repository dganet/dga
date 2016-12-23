<?php
namespace Api\Model\Entity;

class Usuario extends \GORM\Model{
	private $id;
	private $email;
	private $senha;
	private $nome;
	private $cargo;
	private $imagem;
	private $cpf;
	private $createAt;
	private $updateAt;

	public function __construct($data = []){
		isset($data['id']) : $this->id = $data['$id'] ? $this->id = null ;
		isset($data['email']) : $this->email = $data['$email'] ? $this->email = null ;
		isset($data['senha']) : $this->senha = $data['$senha'] ? $this->senha = null ;
		isset($data['nome']) : $this->nome = $data['$nome'] ? $this->nome = null ;
		isset($data['cargo']) : $this->cargo = $data['$cargo'] ? $this->cargo = null ;
		isset($data['imagem']) : $this->imagem = $data['$imagem'] ? $this->imagem = null ;
		isset($data['cpf']) : $this->cpf = $data['$cpf'] ? $this->cpf = null ;
		isset($data['createAt']) : $this->createAt = $data['$createAt'] ? $this->createAt = null ;
		isset($data['updateAt']) : $this->updateAt = $data['$updateAt'] ? $this->updateAt = null ;
		$this->class = $this;
	}

	public function __get($attr){
		switch ($attr) {
			case 'id':
				return $this->id;
				break;
			case 'email':
				return $this->email;
				break;
			case 'senha':
				return $this->senha;
				break;
			case 'nome':
				return $this->nome;
				break;
			case 'cargo':
				return $this->cargo;
				break;
			case 'imagem':
				return $this->imagem;
				break;
			case 'cpf':
				return $this->cpf;
				break;
			case 'createAt':
				return $this->createAt;
				break;
			case 'updateAt':
				return $this->updateAt;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function __set($attr, $value){
		switch ($attr) {
			case 'id':
				$this->id = $value;
				break;
			case 'email':
				$this->email = $value;
				break;
			case 'senha':
				$this->senha = $value;
				break;
			case 'nome':
				$this->nome = $value;
				break;
			case 'cargo':
				$this->cargo = $value;
				break;
			case 'imagem':
				$this->imagem = $value;
				break;
			case 'cpf':
				$this->cpf = $value;
				break;
			case 'createAt':
				$this->createAt = $value;
				break;
			case 'updateAt':
				$this->updateAt = $value;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function toAttay(){
		return array(
			'$id' => $this->id,
			'$email' => $this->email,
			'$senha' => $this->senha,
			'$nome' => $this->nome,
			'$cargo' => $this->cargo,
			'$imagem' => $this->imagem,
			'$cpf' => $this->cpf,
			'$createAt' => $this->createAt,
			'$updateAt' => $this->updateAt
			);
	}

}