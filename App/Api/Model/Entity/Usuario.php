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

	/**
	 * Executa antes de salvar
	 *
	 * @return void
	 */
	public function beforeSave(){
		$this->senha = md5($this->senha);
		$this->createAt = date('Y-m-d H:i:s');
	}
	/**
	 * Executa antes de Atualizar
	 *
	 * @return void
	 */
	public function beforeUpdate(){
		$this->senha = md5($this->senha);
		$this->updateAt = date('Y-m-d H:i:');
	}
}