<?php
namespace Api\Model\Entity;

class Usuario extends \GORM\Model{
	public $id;
	public $email;
	public $senha;
	public $nome;
	public $cargo;
	public $fkImagem;
	public $cpf;
	public $status;
	public $createAt;
	public $updateAt;
}