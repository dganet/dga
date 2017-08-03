<?php
namespace Api\Model\Entity;

class Usuario extends \GORM\Model{
	public $id;
	public $email;
	public $senha;
	public $nome;
	public $cargo;
	public $imagem;
	public $cpf;
	public $status;
	public $createAt;
	public $updateAt;
}