<?php 
namespace Api\Controller;
use \Api\Model\Entity\Periodo, \Api\Controller\AuditController as Audit;

class PeriodoController implements Controller {

	// // Salva as Informações do Associado
	// public function cadastrar($data){
	// 	$periodo = new Periodo($data);
	// 	$periodo->createAt = date('Y-m-d H:i:s');
	// 	$periodo->status = "ATIVO";
	// 	return $periodo->save();
	// }

	// //Lista todos os periodos
	// public function listaTudo(){
	// 	$periodo = new Periodo();
	// 	$array =$periodo->select(array('where' => array('status' => 'ATIVO')));
	// 	$array[0]['qtasVagas'] = (int) $array[0]['qtasVagas'];
	// 	return $array; 
	// }
	// //Lista Por Id
	// public function listaPorId($id){
	// 	$periodo = new Periodo();
	// 	$array =$periodo->select(array('where' => array('id' => $id)));
	// 	$array[0]['qtasVagas'] = (int) $array[0]['qtasVagas'];
	// 	return $array; 
	// }
	// public function listaInativo(){
	// 	$periodo = new Periodo();
	// 	$array =$periodo->select(array('where' => array('status' => 'INATIVO')));
	// 	$array[0]['qtasVagas'] = (int) $array[0]['qtasVagas'];
	// 	return $array; 
	// }
	// //Update de cadastro
	// public function atulizaCadastro($data){
	// 	$periodo = new Periodo($data);
	// 	$periodo->createAt = date('Y-m-d H:i:s');
	// 	$periodo->update();
	// }
	// //Desativa o cliente
	// public function inativar($id){
	// 	$periodo = new Periodo();
	// 	$periodo->id = $id;
	// 	$periodo->createAt = date('Y-m-d H:i:s');
	// 	$periodo->status = 'INATIVO';
	// 	$periodo->update();
	// }

}