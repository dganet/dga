<?php
namespace Api\Controller;

interface Controller{

	public function cadastrar($data);
	public function listaTudo();
	public function listaPorId($id);
	public function atulizaCadastro($data);
	public function inativar($id);
}