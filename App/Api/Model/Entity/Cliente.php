<?php
namespace App\Model\Entity;

class Cliente extends \App\Model\Model{
	private $idcliente;
	private $usuario_idusuario;
	private $nome;
	private $telefoneResidencial;
	private $telefoneComercial;
	private $telefoneCelular;
	private $email;
	private $endereco;
    private $status;
    private $createAt;
    private $updatedAt;
   
   public function __construct($data = []){
   	isset($data['idcliente']) ? $this->idcliente = $data['idcliente'] : $this->idcliente = null;
   	isset($data['usuario_idusuario']) ? $this->usuario_idusuario = $data['usuario_idusuario'] : $this->usuario_idusuario = null;
   	isset($data['nome']) ? $this->nome = $data['nome'] : $this->nome = null;
   	isset($data['telefoneResidencial']) ? $this->telefoneResidencial = $data['telefoneResidencial'] : $this->telefoneResidencial = null;
   	isset($data['telefoneComercial']) ? $this->telefoneComercial = $data['telefoneComercial'] : $this->telefoneComercial = null;
   	isset($data['telefoneCelular']) ? $this->telefoneCelular = $data['telefoneCelular'] : $this->telefoneCelular = null;
   	isset($data['email']) ? $this->email = $data['email'] : $this->email = null;
   	isset($data['endereco']) ? $this->endereco = $data['endereco'] : $this->endereco = null;
   	isset($data['status']) ? $this->status = $data['status'] : $this->status = null;
   	isset($data['createAt']) ? $this->createAt = $data['createAt'] : $this->createAt = null;
   	isset($data['updatedAt']) ? $this->updatedAt = $data['updatedAt'] : $this->updatedAt = null;
   	$this->class = $this;
   }
   public function __get($attr){
   	switch ($attr) {
   		case 'idcliente':
   			return $this->idcliente;
   			break;
   		case 'usuario_idusuario':
   			return $this->usuario_idusuario;
   			break;
   		case 'nome':
   			return $this->nome;
   			break;
   		case 'telefoneResidencial':
   			return $this->telefoneResidencial;
   			break;
   		case 'telefoneComercial':
   			return $this->telefoneComercial;
   			break;
   		case 'telefoneCelular':
   			return $this->telefoneCelular;
   			break;
   		case 'email':
   			return $this->email;
   			break;
   		case 'endereco':
   			return $this->endereco;
   			break;
   		case 'status':
   			return $this->status;
   			break;
   		case 'createAt':
   			return $this->createAt;
   			break;
   		case 'updatedAt':
   			return $this->updatedAt;
   			break;
   		default:
   			# code...
   			break;
   	}
   }
   public function __set($attr, $value){
   	switch ($attr) {
   		case 'idcliente':
   			$this->idcliente = $value;
   			break;
   		case 'usuario_idusuario':
   			$this->usuario_idusuario = $value;
   			break;
   		case 'nome':
   			$this->nome = $value;
   			break;
   		case 'telefoneResidencial':
   			$this->telefoneResidencial = $value;
   			break;
   		case 'telefoneComercial':
   			$this->telefoneComercial = $value;
   			break;
   		case 'telefoneCelular':
   			$this->telefoneCelular = $value;
   			break;
   		case 'email':
   			$this->email = $value;
   			break;
   		case 'endereco':
   			$this->endereco = $value;
   			break;
   		case 'status':
   			$this->status = $value;
   			break;
   		case 'createAt':
   			$this->createAt = $value;
   			break;
   		case 'updatedAt':
   			$this->updatedAt = $value;
   			break;
   		default:
   			# code...
   			break;
   	}

   	public function toArray(){
      return array(
        "idcliente"           => $this->idcliente,
        "usuario_idusuario"   => $this->usuario_idusuario,
        "nome"                => $this->nome,
        "telefoneResidencial" => $this->telefoneResidencial,
        "telefoneComercial"   => $this->telefoneComercial,
        "telefoneCelular"     => $this->telefoneCelular,
        "email"               => $this->email,
        "endereco"            => $this->endereco,
        "createAt"            => $this->status,
        "updatedAt"           => $this->createAt,
        "status"              => $this->updatedAt
      );  
    }

   }